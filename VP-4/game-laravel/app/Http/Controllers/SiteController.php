<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        $categories = Category::get();
        $news = News::inRandomOrder()->paginate(3);
        $products = Product::inRandomOrder()->paginate(6);
        $goods = Product::inRandomOrder()->limit(1)->get();
        return view('site.index')->with(compact('categories', 'products', 'news', 'goods'));
    }

    public function category($id) {
        $categoryDetails = Category::where('id', $id)->firstOrFail();
        $categories = Category::get();
        $product = Product::where('id', $id)->firstOrFail();
        $news = News::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('categories.category')->with(compact('categoryDetails', 'product', 'categories', 'news', 'goods'));
    }

    public function products($url = null) {
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categoryDetails = Category::where(['url' => $url])->first();

        $productsAll = Product::where(['category_id' => $categoryDetails->id])->get();

        $news = News::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('categories.category')->with(compact('categoryDetails', 'productsAll', 'categories', 'news', 'goods'));
    }

    public function news() {
        $newsDetails = News::inRandomOrder()->paginate(2);
        $categories = Category::get();
        $news = News::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('news.news-index')->with(compact('newsDetails', 'categories', 'news', 'goods'));
    }

    public function article($id) {
        $newsDetails = News::where('id', $id)->firstOrFail();
        $news = News::inRandomOrder()->paginate(3);
        $categories = Category::get();
        $productsRandom = Product::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('news.article')->with(compact('newsDetails', 'productsRandom', 'categories', 'news', 'goods'));
    }

    public function company() {
        $categories = Category::all();
        $productsRandom = Product::inRandomOrder()->paginate(3);
        $news = News::inRandomOrder()->paginate(3);
        $goods = Product::inRandomOrder()->limit(1)->get();

        return view('site.company')->with(compact('categories','productsRandom', 'news', 'goods'));
    }
}
