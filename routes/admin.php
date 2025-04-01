<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\offersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SystemActivityLog;
use App\Http\Controllers\userPermissionController;
use App\Models\PageLink;

Route::prefix('admin')->middleware('guest:admin')->group(function(){

    Route::get('/login',[AdminController::class,'index'])->name('admin.login_form');
    Route::post('/login/owner',[AdminController::class,'login'])->name('admin.login');
    });


   
    Route::prefix('admin')->middleware('auth:admin')->group(function(){


                // general routes 
                Route::get('/home/',[AdminController::class,'home'])->name('admin.home'); 
                Route::post('/logout/',[AdminController::class,'adminLogout'])->name('admin.logout');       
                Route::get('/notifications/',[settingsController::class,'notify'])->name('notifications.index');
              
                 //only for admins 
                Route::get ('/users/',[userPermissionController::class,'index'])->middleware(['permission:view users', 'role:admin|super admin'])->name('user.index');
                Route::get('/roles/',[roleController::class,'index'])->middleware(['permission:view users','role:admin|super admin'])->name('roles.index');
                Route::get('/permissions/',[permissionController::class,'index'])->middleware(['permission:view users','role:admin|super admin'])->name('permissions.index');
                Route::get('/activities/',[SystemActivityLog::class,'index'])->middleware(['permission:view activity log','role:admin|super admin'])->name('systemActivity.index');
                Route::get('/dropdownLists/',[settingsController::class,'index'])
                 ->middleware(['permission:view system settings','role:admin|super admin'])
                ->name('dropdown.index');
              
                Route::get('/site/infos/',[settingsController::class,'siteInfo'])
                ->middleware(['permission:view system settings','role:admin|super admin'])
               ->name('siteInfo.index');

               Route::get('/site/social/links',[settingsController::class,'socialLinks'])
               ->middleware(['permission:view system settings','role:admin|super admin'])
              ->name('socialLinks.index');
             
              Route::get('/site/banner/images',[settingsController::class,'bannerImages'])
              ->middleware(['permission:view system settings','role:admin|super admin'])
             ->name('bannerImages.index');
            
             Route::get('/site/page/links',[settingsController::class,'pageLinks'])
             ->middleware(['permission:view system settings','role:admin|super admin'])
            ->name('pageLinks.index');
              
           //products routes
           Route::get('/products/',[ProductController::class,'index'])->middleware(['permission:view products'])->name('products.index');
           Route::get('/suppliers/',[SupplierController::class,'index'])->middleware(['permission:view suppliers'])->name('suppliers.index');
           Route::get('/categories/',[ProductCategoryController::class,'index'])->middleware(['permission:view categories'])->name('categories.index');
           Route::get('/offers/',[offersController::class,'index'])->middleware('permission:view offers')->name('offers.index');
           Route::get('/product/discounts/',[offersController::class,'discount'])->name('productDiscount.index');
    
        //    inventory management routes
        Route::get('/inventory/',[StockController::class,'index'])->middleware(['permission:view stocks'])->name('stock.index');
            
     // mail test 


    // Route::get('/test/email', function () {
    //     Mail::raw('This is a test ....', function ($message) {
    //         $message->to('smart@test.com')->subject('Test Mail');
    //     });
    //     return 'Email has been sent!';
    // });
        

       
        });
      

    
    
    
    
    