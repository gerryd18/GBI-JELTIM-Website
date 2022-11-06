<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        
        return view('category/index', compact('categories'));
    }

    public function store(Request $request){

        // validasi
        $request->validate([
            'categoryTitle' => 'required|min:3|string'
        ]);

        Category::create([
            'title' => $request->categoryTitle
        ]);

        return redirect('/category')->with('success_message',($request->categoryTitle . " successfully inserted!"));
    }

    public function destroy($id){

        $category = Category::find($id);
        $name = $category->title;

        $category->delete();

        return redirect('/category')->with('success_message',($name . " successfully deleted!"));
    }

    public function edit($id){
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'categoryTitle' => 'required|min:3|string'
        ]); 

        $category = Category::find($id);

        $category->update([
            'title' => $request->categoryTitle
        ]);

        return redirect('/category')->with('success_message',($request->categoryTitle . " successfully updated!"));
    }
}
