<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\News;
use App\Order;
use App\OrdersProduct;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        foreach($products as $key => $val) {
            $category_name = Category::where(['id' => $val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }

        return view('admin.products.index')->with(compact('products'));
    }

    public function product($id = null) {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
        //$adminDetails = Admin::where('id', $id)->first();

        $productDetails = Product::where('id', $id)->first();
        $relatedProducts = Product::where('id', '!=', $id)->where(['category_id' => $productDetails->category_id])->get();

        $categories = Category::all();
        $news = News::inRandomOrder()->paginate(3);
        $productsRandom = Product::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('products.product')->with(compact('userDetails', 'productDetails', 'categories',
            'productsRandom', 'news', 'goods', 'relatedProducts'));
    }

    public function emailOrder(Request $request, $id = null) {
        if($request->isMethod('post')) {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;

            $admin_email = DB::table('admins')->distinct()->pluck('admin_email')->toArray();

            $userDetails = User::find($user_id);
            $productDetails = Product::where(['id' => $id])->first();
            //$productDetails = json_decode(json_encode($productDetails),true);
            //echo "<pre>"; print_r($productDetails);

            $messageData = [
                'email' => $user_email,
                'admin_email' => $admin_email,
                'productDetails' => $productDetails,
                'userDetails' => $userDetails
            ];
            Mail::send('email.order', $messageData, function($message) use($user_email, $admin_email) {
                $message->from($user_email);
                $message->to($admin_email)->subject('Заявка на товар в магазине Game');
            });
            //code for mail end

            $categories = Category::all();
            $news = News::inRandomOrder()->paginate(3);
            $productsRandom = Product::inRandomOrder()->paginate(3);
            $goods = Product::inRandomOrder()->limit(1)->get();

            return view('email.email-order')->with(compact('userDetails', 'categories',
                                    'news', 'productsRandom', 'goods', 'productDetails', 'product_name'));
        }
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            if(empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_error', 'Category is missing');
            }

            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->price = $data['price'];
            $product->description = $data['description'];

            if($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'img/products/large/'.$filename;
                    $standard_image_path = 'img/products/standard/'.$filename;
                    $small_image_path = 'img/products/small/'.$filename;

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(250,150)->save($standard_image_path);
                    Image::make($image_tmp)->resize(100,50)->save($small_image_path);

                    $product->image = $filename;
                }
            }
            $product->save();
            return redirect('/admin/products/index')->with('flash_message_success', 'Product has been added successfully!');
        }
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat) {
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
        }
        return view('admin.products.create')->with(compact('categories_dropdown'));
    }

    public function edit(Request $request, $id = null)
    {
        if($request->isMethod('post')) {
            $data = $request->all();

            if($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'img/products/large/'.$filename;
                    $standard_image_path = 'img/products/standard/'.$filename;
                    $small_image_path = 'img/products/small/'.$filename;

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(250,150)->save($standard_image_path);
                    Image::make($image_tmp)->resize(100,50)->save($small_image_path);
                }
            }
            Product::where(['id' => $id])->update([
               'category_id' => $data['category_id'],
               'product_name' => $data['product_name'],
               'price' => $data['price'],
               'description' => $data['description'],
               'image' => $filename,
            ]);
            return redirect()->back()->with('flash_message_success', 'Продукт был редактирован!');
        }

        $productDetails = Product::where(['id' => $id])->first();

        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) {
            if($cat->id == $productDetails->category_id) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
        }
        return view('admin.products.edit')->with(compact('productDetails', 'categories_dropdown'));
    }

    public function delete($id = null)
    {
        Product::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'Продукт успешно удален');
    }

    public function addtocart(Request $request) {
        $data = $request->all();
        if(empty(Auth::user()->email)) {
            $data['user_email'] = '';
        } else {
            $data['user_email'] = Auth::user()->email;
        }

        $session_id = Session::get('session_id');
        if(empty($session_id)) {
            $session_id = str_random(40);
            Session::put('session_id', $session_id);
        }

        $countProducts = DB::table('cart')->where([
            'product_id' => $data['product_id'],
            'session_id' => $session_id,
        ])->count();

        if($countProducts > 0) {
            return redirect()->back()->with('flash_message_error', 'Продукт уже есть в корзине');
        } else {
            DB::table('cart')->insert([
                'product_id' => $data['product_id'],
                'product_name' => $data['product_name'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'user_email' => $data['user_email'],
                'session_id' => $session_id,
            ]);
        }
        return redirect('cart')->with('flash_message_success', 'Продукт успено добавлен в корзину');
    }

    public function cart() {
        if(Auth::check()) {
            $user_email = Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        } else {
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();
        }

        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }

        $categories = Category::all();
        $news = News::inRandomOrder()->paginate(3);
        $productsRandom = Product::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('products.cart')->with(compact('userCart', 'goods', 'categories', 'news', 'productsRandom'));
    }

    public function updateCartQuantity($id = null, $quantity = null) {
        $getProductName = DB::table('cart')->select('product_name', 'quantity')->where('id', $id)->first();
        $update_quantity = $getProductName->quantity + $quantity;

        DB::table('cart')->where('id', $id)->increment('quantity', $quantity);
        return redirect('cart')->with(compact('update_quantity'));
    }

    public function deleteCartProduct($id = null) {
        DB::table('cart')->where('id', $id)->delete();
        return redirect('cart')->with('flash_message_success', 'Продукт был успешно удален!');
    }

    public function checkout() {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id', $user_id)->first();

        $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id', $product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }

        $categories = Category::all();
        $news = News::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('products.checkout')->with(compact('userDetails', 'userCart', 'categories', 'news', 'goods'));
    }

    public function placeOrder(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $user_name = Auth::user()->name;

            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $user_name;
            $order->grand_total = $data['grand_total'];
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();
            $cartProducts = DB::table('cart')->where(['user_email' => $user_email])->get();
            foreach ($cartProducts as $pro) {
                $cartPro = new OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();
            }

            Session::put('order_id', $order_id);
            Session::put('grand_total', $data['grand_total']);

            return redirect('/thanks');
        }
    }

    public function thanks() {
        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email', $user_email)->delete();

        $categories = Category::all();
        $news = News::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('orders.thanks')->with(compact('categories', 'news', 'goods'));
    }

    public function userOrders() {
        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where('user_id', $user_id)->orderBy('id', 'DESC')->get();

        $categories = Category::all();
        $news = News::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('orders.user_orders')->with(compact('orders', 'categories', 'news', 'goods'));
    }

    public function userOrdersDetails($order_id) {
        $user_id = Auth::user()->id;
        $orderDetails = Order::with('orders')->where('id', $order_id)->first();

        $categories = Category::all();
        $news = News::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('orders.user_order_details')->with(compact('orderDetails', 'categories', 'news', 'goods'));
    }
}
