<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
    function subcategories(){

        return view('backend.category.subcategory.subcategory_view' ,[
            'subcats' => SubCategory::paginate(10)
        ]);

    }
    function addsubcategory(){
        return view('backend.Category.subcategory.subcategory_from' , [
            'categories' => Category::orderBy('category_name' , 'asc')->get()
        ]);

    }

    function postsubcategory(Request $request){
       $sub = new Subcategory;
       $sub->subcategory_name = $request->subcategory_name;
       $sub->slug = Str::slug($request->subcategory_name);
       $sub->category_id = $request->category_id;
       $sub->save();

       
        return back();
       
    }
    // all delete sub category check start

    function allsubcategorydelete(Request $request){
        
       foreach($request->scat_id as $scat_id){
         SubCategory::findOrFail($scat_id)->delete();
        
        //  $scat =  SubCategory::findOrFaill($scat_id);
        //  $scat->delete();
        
       }
       return back();


    }

      // all delete sub category check end

    //   delete sub category start

     function subdeletecategory($data){
        
        $sub =  SubCategory::findOrFail($data)->delete();
     
  
          return back()->with('success' , 'Sub category Deleted Successfully');
      }

       // update subcategory
     function subupdatecategory(Request $request){
        // $cat = Category::findOrFail($request->cat_id);
        // $cat->category_name = $request->category_name;
        // $cat-> slug = Str::slug($request->category_name);
        // $cat->save();
          SubCategory::findOrFail($request->scat_id)->update([
           'category_name' =>  $request->subcategory_name,
         'slug' => Str::slug($request->subcategory_name),
          ]);

          return redirect('/subcategories')->with('success' , 'Sub Category Updated Successfully');
        // return back()->with('success' , 'Category Updated Successfully');
      
     }

     // editcategory
    function subcategoryedit($sub){


        return view('backend.category.subcategory.subcategory_edit', [
           $sub => SubCategory::findOrFail($sub),
        ]);
    }

    //  trashedcategory
    function trashedsubcategory(){
               
        return view('backend.category.subcategory.trashedsub' , [
          'subcategories' => SubCategory::onlyTrashed()->paginate()
        ]);
       }
      //  restoresub
      function restoresubcategory($id){
        SubCategory::onlyTrashed()->findOrFail($id)->restore();
  
        return back()->with('success' , 'Sub Category Restored Successfully');
      }
   

}
