<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Information;
use App\models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::where('title', 'Pengumuman Ibadah')->get();
        $informations = Information::where('category_id', $category[0]->id)->get();
        return view('home',compact('informations'));
    }
}
