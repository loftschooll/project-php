<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index')->with(compact('categories'));
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();

            $category = new Category;
            $category->name = $data['name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/category/index')->with('flash_message_success', 'Category added');
        }
        $levels = Category::where(['parent_id' => 0])->get();
        return view('admin.category.create')->with(compact('levels'));
    }

    public function edit(Request $request, $id = null)
    {
        if($request->isMethod('post')) {
            $data = $request->all();

            Category::where(['id' => $id])->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'url' => $data['url']]);
            return redirect('/admin/category/index')->with('flash_message_success', 'Категория обновлена успешно!!!');
        }
        $categoryDetails = Category::where(['id' => $id])->first();
        $levels = Category::where(['parent_id' => 0])->get();
        return view('admin.category.edit')->with(compact('categoryDetails', 'levels'));
    }

    public function delete($id = null){
        if(!empty($id)) {
            Category::where(['id' => $id])->delete();
            return redirect()->back()->with('flash_message_success', 'Категория удалена успешно!!!');
        }
    }
}
