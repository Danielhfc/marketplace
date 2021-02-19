<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group(function(){
        Route::get('/', 'CartController@index')->name('index');
        Route::post('add', 'CartController@add')->name('add');
       
        Route::get('remove/{slug}', 'CartController@remove')->name('remove');
        Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::get('/model', function (){
//     $products = \App\Product::all();

//     $user = new \App\User();
//     $user->name = 'Usuário Teste';
//     $user->email = 'email@teste.com';
//     $user->password = bcrypt('12345678');
    
//     return $user->save();

//Como eu faria para pegar a loja de um usuário
//$user = \App\User::fin(4);

//dd($user->store()->count());

//Pegar os produtos de uma loja?
// $loja = \App\Store::find(1);
//return $loja->products; | $loja->products()->where('id', 9)->get();

//Pegar as lojas de uma categoriade uma loja?
// $categoria = \App\Category::find(1);
// $categoria->products;

        //Criar uma loja para um usuário
    // $user = \App\User::find(10);
    // $store = $user->store()->create([
    //     'name' => 'Loja Teste',
    //     'description' => 'Loja Teste de produtos de informática',
    //     'mobile_phone' => 'XX-XXXXX-XXXX',
    //     'phone' => 'XX-XXXXX-XXXX',
    //     'slug' => 'Loja Teste'
    // ]);
    
        //Criar um produto para a loja
    // $store = \App\Store::find(1);
    // $product = $store->products()->create([
    // 'name' => 'Notebook Dell',
    // 'description' => 'Core I5 10GB',
    // 'body' => 'Qualquer coisa...', 
    // 'price' => 2999.00,
    // 'slug' => 'notebook-dell',
    // ]);
    
    // dd($product);



        //Criar uma categoria
    // $category = \App\Category::create([
    //     'name' => 'Games',
    //     'description' => null,
    //     'slug' => 'games',
    // ]);

    // $category = \App\Category::create([
    //     'name' => 'Notebooks',
    //     'description' => null,
    //     'slug' => 'notebooks',
    // ]);

    // return \App\Category::all();


        //Adicionar um produto para uma categoria 
//    return \App\User::find(31);
//    dd($product->categories()->sync([1,2]));

    $product = \App\Product::find(39);

    return $product->categories;
//return \App\User::all();
});

Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/', 'CheckoutController@index')->name('index'); 
});

Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
        // Route::prefix('stores')->name('stores.')->group(function(){
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update'); 
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });
    
        Route::resource('stores', 'StoreController');
        Route::resource('products','ProductController');
        Route::resource('categories', 'CategoryController');

        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
