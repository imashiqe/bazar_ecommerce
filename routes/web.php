 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('dashboard' , [DashboardController::class, 'dashboard'])->name('dashboard');
// category
Route::get('categories' , [CategoryController::class, 'categories'])->name('categories');
Route::get('add-category' , [CategoryController::class, 'addcategory'])->name('addcategory');
Route::post('post-category' , [CategoryController::class, 'postcategory'])->name('postcategory');
// delete category
Route::get('delete-category/ {cat}' , [CategoryController::class, 'deletecategory'])->name('deletecategory');
// edit category
Route::get('update-category' , [CategoryController::class, 'updatecategory'])->name('updatecategory');
Route::get('category_edit/{cat}' , [CategoryController::class, 'editcategory'])->name('editcategory');
// trashed
Route::get('trashed-category' , [CategoryController::class, 'trashedcategory'])->name('trashedcategory');
Route::get('restore-category/{slug} ', [CategoryController::class, 'restorecategory'])->name('restorecategory');
// Route::post('permanent-category/{$id}' , [CategoryController::class, 'permanentcategory'])->name('permanentcategory');
Route::post('permanent-category' , [CategoryController::class, 'permanentcategory'])->name('permanentcategory');

// sub category
Route::get('subcategories' , [SubCategoryController::class, 'subcategories'])->name('subcategories');
Route::get('add-subcategory' , [SubCategoryController::class, 'addsubcategory'])->name('addsubcategory');
Route::post('post-subcategory' , [SubCategoryController::class, 'postsubcategory'])->name('postsubcategory');
// check s cat delete
Route::post('all-subcategory-delete' , [SubCategoryController::class, 'allsubcategorydelete'])->name('allsubcategorydelete');
// delete sub category
Route::get('sub-delete-category/{sub}' , [SubCategoryController::class, 'subdeletecategory'])->name('subdeletecategory');
// edit sub
Route::get('sub-update-category' , [SubCategoryController::class, 'subupdatecategory'])->name('subupdatecategory');
Route::get('sub-category-edit/ {sub}' , [SubCategoryController::class, 'subcategoryedit'])->name('subcategoryedit');
// sub trashed
Route::get('trashed-subcategory' , [SubCategoryController::class, 'trashedsubcategory'])->name('trashedsubcategory');
// restoresub
Route::get('restore-subcategory/{slug} ', [SubCategoryController::class, 'restoresubcategory'])->name('restoresubcategory');

// product start
Route::get('products' , [ProductController::class, 'products'])->name('products');
Route::get('add-products' , [ProductController::class, 'addproducts'])->name('addproducts');
Route::post('post-products' , [ProductController::class, 'postproducts'])->name('postproducts');
Route::get('api/get-subcat-list/{cat_id}' , [ProductController::class, 'GetSubCat'])->name('GetSubCat');
Route::get('product-edit/{product_id}' , [ProductController::class, 'productedit'])->name('productedit');

require __DIR__.'/auth.php';
