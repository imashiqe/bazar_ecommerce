<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Image;


class ProductController extends Controller
{
   function products(){
   
    return view('backend.Product.product_view' ,[
      'products' => Product::paginate(10),
  ]);
       
   }

   function addproducts(){
       return view('backend.product.product_form' , [
        'cats' => Category::all()
       ]);
         
   }

//    image part

   function postproducts(Request $request){
     $request->validate([
           'thumbnail' => ['required' , 'mimes:jpeg,png,jpg']
     ]);
     $product = new Product;
     $product->title = $request->title;
     $product->slug = str::slug ($request->title);
     $product->category_id = $request->category_id;
     $product->subcategory_id = $request->subcategory_id;
     $product->summary = $request->summary;
     $product->description = $request->description;

     $slug = str::slug ($request->title);

       if ($request->hasFile('thumbnail')){
           $image = $request->file('thumbnail');
           $ext = Str::random(5) . '-' . $slug .'.'.$image->getClientOriginalExtension();
           Image::make($image)->save(public_path('thumbnail/'. $ext) , 70);
           $product->thumbnail = $ext;
        //    Image::make(Input::file('photo'))->resize(300, 200)->save('foo.jpg');
        
       }

       $product->save();

       return back()->with('success', 'Product Added Successfully');

   }

   function GetSubCat($id){
     $scat =   SubCategory::where('category_id', $id)->get();
      return response()->json($scat);
   }
//   product edit
   function productedit($slug){
      $product = Product::where('slug', $slug)->first();
      return view('backend.product.product_edit' ,[
         'cats' => Category::all(),
         'product' => $product,
         'scat' => SubCategory::where('category_id' , $product->category_id)->get(),

      ]);
          
   }


}
