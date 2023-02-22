<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    function categories(){
        $cats = Category::OrderBy('category_name' , 'asc')->paginate(10);
        return view('backend.category.category_view' , compact('cats'));
    }

    function addcategory(){
        return view('backend.category.category_form');
    }

    function postcategory(Request $request){
       
          // return "ok";
      //    return $request->all();
      $request->validate([
        'category_name' => ['required' , 'min:3' , 'max:20' , 'unique:categories'],
        'slug' => ['required' ,'unique:categories'],
       ]);

       $cat = new Category;
       $cat->category_name = $request->category_name;
       $cat-> slug = Str::slug($request->category_name);
       $cat->save();

       return redirect('/categories');
    }
    // deletecategory
    function deletecategory($data){
        
      $cat =  Category::findOrFail($data)->delete();
   

        return back()->with('success' , 'category Deleted Successfully');
    }
    // editcategory
    function editcategory($data){


        return view('backend.category.category_edit', [
           'cat' => Category::findOrFail($data),
        ]);
    }
    // updatecategory
     function updatecategory(Request $request){
        // $cat = Category::findOrFail($request->cat_id);
        // $cat->category_name = $request->category_name;
        // $cat-> slug = Str::slug($request->category_name);
        // $cat->save();
          Category::findOrFail($request->cat_id)->update([
           'category_name' =>  $request->category_name,
         'slug' => Str::slug($request->category_name),
          ]);

          return redirect('/categories')->with('success' , 'Category Updated Successfully');
        // return back()->with('success' , 'Category Updated Successfully');
      
     }
    //  trashedcategory
     function trashedcategory(){
               
      return view('backend.Category.trashed' , [
        'categories' => Category::onlyTrashed()->paginate()
      ]);
     }
  //  category restore permanent delete
    function restorecategory($id){
      Category::onlyTrashed()->findOrFail($id)->restore();

      return back()->with('success' , 'Category Restored Successfully');
    }
    function permanentcategory(Request $request){
             
     if (Auth::check()) {
      session('key' , 'default');
     if (Hash::check($request->password , Auth::user()->password)) {
          
          Category::onlyTrashed()->findOrFail($request->cat_id)->forceDelete();
          session('key' , 'Yes');
           return back()->with('success' , 'Permanent Deleted  Successfully');
     }
       else{
        return back()->with('success' , 'Your Password Wrong');
       }
       
      }

     
    }

       // Category::withTrashed()->findOrFail($id)->forceDelete();
      // Category::onlyTrashed()->findOrFail($id)->forceDelete();
      // function permanentcategory($id){
      //   Category::onlyTrashed()->findOrFail($id)->forceDelete();
      //   return back()->with('success' , 'Permanent Deleted  Successfully');
      // }

    

}
