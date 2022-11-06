<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Information;
use App\models\Category;

class PageController extends Controller
{
    public function index(){
        $category = Category::where('title', 'Pengumuman Ibadah')->get();
        $informations = Information::where('category_id', $category[0]->id)->get();
        return view('home',compact('informations'));
    }

    public function allInfo(){
        $informations = Information::paginate(5);

        return view('information/allInfo', compact('informations'));
    }

    public function contact(){
        return view('contact-us');
    }
}
