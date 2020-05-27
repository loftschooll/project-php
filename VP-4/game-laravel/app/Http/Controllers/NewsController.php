<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function index() {
        $news = News::all();
        return view('admin.news.news-index')->with(compact('news'));
    }

    public function create(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();

            $article = new News();
            $article->news_name = $data['news_name'];
            $article->date = $data['date'];
            $article->description = $data['description'];

            if($request->hasFile('news_image')) {
                $image_tmp = Input::file('news_image');
                if($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'img/news/large/'.$filename;
                    $standard_image_path = 'img/news/standard/'.$filename;
                    $small_image_path = 'img/news/small/'.$filename;

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(230,200)->save($standard_image_path);
                    Image::make($image_tmp)->resize(140,80)->save($small_image_path);

                    $article->news_image = $filename;
                }
            }
            $article->save();
            return redirect('/admin/news/news-index')->with('flash_message_success', 'News has been added successfully!');
        }
        return view('admin.news.news-create');
    }

    public function edit(Request $request, $id = null) {
        if($request->isMethod('post')) {
            $data = $request->all();

            if($request->hasFile('news_image')) {
                $image_tmp = Input::file('news_image');
                if($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'img/news/large/'.$filename;
                    $standard_image_path = 'img/news/standard/'.$filename;
                    $small_image_path = 'img/news/small/'.$filename;

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(230,200)->save($standard_image_path);
                    Image::make($image_tmp)->resize(140,80)->save($small_image_path);
                }
            }
            News::where(['id' => $id])->update([
                'news_name' => $data['news_name'],
                'date' => $data['date'],
                'description' => $data['description'],
                'news_image' => $filename,
            ]);
            return redirect()->back()->with('flash_message_success', 'Новость была изменина!');
        }

        $newsDetails = News::where(['id' => $id])->first();

        return view('admin.news.news-edit')->with(compact('newsDetails'));
    }

    public function delete($id = null) {
        News::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'Новость успешно удалена');
    }
}
