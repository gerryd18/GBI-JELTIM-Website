<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Information;
use App\models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index(){
            $informations = Information::paginate(5);
            $categories = Category::all();

            return view('information.index', [
                'informations' => $informations,
                'categories' => $categories
            ]);
    }
    
    public function destroy($id){
        $info = Information::find($id);

        
        if ($info->user_id != Auth::user()->id) {
            abort(404);
        }else{
            //delete image from local
            if (Storage::exists('public/images/cover/' . $info->cover)) {
                Storage::delete('public/images/cover/' . $info->cover);
            }
            
            Information::find($id)->delete();
            
            
            return redirect('/information')->with('success_message', ($info->title . ' deleted successfully!'));
        }
    }

    public function store(Request $request){
        $request->validate([
            'cover' => 'required|',
            'title' => 'required|min:3|string',
            'description' => 'required|min:3|string',
            'date'=> 'required|',
            'category' => 'required|numeric',
            'content' => 'required|min:3|string'
        ]);

        // file processing
        $file = $request->file('cover');
        $fullFileName = $file->getClientOriginalName(); // full file name
        $fileName = pathinfo($fullFileName)['filename']; // wile name without extension (.png/.jpg/else..)
        $extension = $file->getClientOriginalExtension();

        $coverName = $fileName . '-' .Str::random(10) . '-' . date('YmdHis') . '.' . $extension;

        
        //store to db
        Information::create([
            'cover' => $coverName,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'date' => $request->date,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id, 
        ]);
        
        //    save to laravel storage                  
        $file ->storeAs('public/images/cover', $coverName);
        return redirect('/information')->with('success_message','Information created successfully!');
    }

    public function searchInformation(Request $request){
        $search = Information::where('title','like','%'. $request->searchInput. '%')->get(); // searchInput = atribut name pada input

        return view('information/result', [
            'informations' => $search 
        ]);
    }

    public function edit($id){
        $info = Information::find($id);
        $categories = Category::all();

        return view('information/edit', compact('info','categories'));
    }

    public function update(Request $request, $id){
        $info = Information::find($id);

        if($request->file('cover') == null){
            $request->validate([
                'title' => 'required|min:3|string',
                'description' => 'required|min:3|string',
                'date' => 'required|',
                'content' => 'required|min:3|string',
                'category' => 'required|numeric',
            ]);

            //update to db
             $info->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'status' =>'Pending',
                'user_id' => Auth::user()->id, 
                'title' => $request -> title,
                'category_id' => $request->category,
            ]);
        }else{
            $request->validate([
                'cover' => 'required|',
                'title' => 'required|min:3|string',
                'date' => 'required|',
                'description' => 'required|min:3|string',
                'content' => 'required|min:3|string',
                'category' => 'required|numeric',
            ]);
            
            // file processing
            $file = $request->file('cover');
            $fullFileName = $file->getClientOriginalName(); // full file name
            $fileName = pathinfo($fullFileName)['filename']; // wile name without extension (.png/.jpg/else..)
            $extension = $file->getClientOriginalExtension();
            
            $coverName = $fileName . '-' . Str::random(10). '-' . date('YmdHis') . '.' .$extension;
             // menghapus gambar lama di local
             if (Storage::exists('public/images/cover/' . $info->cover)) {
                Storage::delete('public/images/cover/' . $info->cover);
            }
            
            //store to db
            $info->update([
                'cover' => $coverName,
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'status' =>'Pending',
                'user_id' => Auth::user()->id, 
                'title' => $request -> title,
                'category_id' => $request->category,
            ]);
            
            //save to laravel storage                  
            $file ->storeAs('public/images/cover', $coverName);
        }

        return redirect('/information')->with('success_message','Information updated successfully!');
    }
   

}
