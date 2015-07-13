<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*================================
=            frontend            =
================================*/
/*==========  login  ==========*/
Route::group(
  [
    'namespace' => 'Front'
  ], function () {
  // show admin login form
  Route::get(
    'login',
    array(
      'middleware' => 'notLogin',
      'uses' => 'FrontLoginController@showLogin'
    )
  );
  // admin login action
  Route::post(
    'login',
    array(
      'middleware' => 'notLogin',
      'uses' => 'FrontLoginController@doLogin'
    )
  );
  // admin logout action
  Route::get(
    'logout',
    array(
      'uses' => 'FrontLoginController@doLogout'
    )
  );
});
/*==========  end login  ==========*/


/*==========  home page  ==========*/
Route::get('/', function () {
  return view('Front/Index/index');
});
/*==========  end home page  ==========*/


/*==========  about page  ==========*/
Route::get('about', function () {
  return view('Front/About/about');
});
/*==========  end about page  ==========*/


/*==========  product page  ==========*/
// products page: show all products
Route::get(
  'product/products',
  array(
    'uses' => 'Api\ProductController@index'
  )
);
// product's detail page: show single product
Route::get(
  'product/product',
  array(
    'uses' => 'Api\ProductController@show'
  )
);
// product's detail: buy or add to cart
Route::post(
  'product/buyorcart',
  array(
    'uses' => 'Api\ProductController@buyorcart'
  )
);
/*==========  end product page  ==========*/


/*============================
=            cart            =
============================*/
// cart page: show cart
Route::get('cart', function () {
  return view('Front/cart');
});
// get all cart items
Route::get('cart/all', function () {
  return Cart::content();
});
// add cart item
Route::post('cart/add', array(
    'uses' => 'Front\CartController@create'
  )
);
// remove cart item
Route::post('cart/remove', array(
    'uses' => 'Front\CartController@destroy'
  )
);
// update cart item
Route::post('cart/update', array(
    'uses' => 'Front\CartController@update'
  )
);
/*-----  End of cart  ------*/


// checkout page: show checkout
Route::get('checkout', function () {
  return view('Front/checkout');
});


// articles page: show all articles
Route::get('articles', function () {
  return view('Front/articles');
});

// article's detial page: show single article
// fix: enter with id
Route::get('article', function () {
  return view('article');
});


// my account page
Route::get('account', function () {
    return view('Front/account');
});
/*-----  End of frontend  ------*/



/*===============================
=            backend            =
===============================*/
/*==========  login  ==========*/
Route::group(
  [
    'namespace' => 'Admin',
    'prefix' => 'admin'
  ], function () {
    // show admin login form
    Route::get(
      'login',
      array(
        'middleware' => 'notLogin',
        'uses' => 'AdminLoginController@showLogin'
      )
    );
    // admin login action
    Route::post(
      'login',
      array(
        'middleware' => 'notLogin',
        'uses' => 'AdminLoginController@doLogin'
      )
    );
    // admin logout action
    Route::get(
      'logout',
      array(
        'uses' => 'AdminLoginController@doLogout'
      )
    );
});
/*==========  end login  ==========*/


Route::group(
  [
    'middleware' => 'admin',
    'prefix' => 'admin'
  ], function () {
    /*==========  admin home page  ==========*/
    Route::get('/', function () {
      return view('Admin/index');
    });
    /*==========  end admin home page  ==========*/
    

    /*==========  product page  ==========*/
    // C
    // add product page
    Route::get(
      'product/new',
      array(
        'uses' => 'Api\ProductController@showNew'
      )
    );
    // create product action
    Route::post(
      'product/create',
      array(
        'uses' => 'Api\ProductController@create'
      )
    );
    // R
    // admin products page: show all products
    Route::get(
      'product/products',
      array(
        'uses' => 'Api\ProductController@index'
      )
    );
    // edit specific product
    Route::get(
      'product/edit',
      array(
        'uses' => 'Api\ProductController@edit'
      )
    );
    // U
    // toggle availability
    Route::post(
      'product/toggleAvailability',
      array(
        'uses' => 'Api\ProductController@toggleAvailability'
      )
    );
    // update product
    Route::post(
      'product/update',
      array(
        'uses' => 'Api\ProductController@update'
      )
    );
    // D
    // destroy specific product
    Route::post(
      'product/destroy',
      array(
        'uses' => 'Api\ProductController@destroy'
      )
    );
    /*==========  end product page  ==========*/
    

    /*==========  category page  ==========*/
    // C 
    // create category
    Route::post(
      'product/category/create',
      array(
        'uses' => 'Api\CategoryController@create'
      )
    );
    // R
    // category page: show categories
    Route::get(
      'product/category',
      array(
        'uses' => 'Api\CategoryController@index'
      )
    );
    // U
    // update specific category
    Route::post(
      'product/category/update',
      array(
        'uses' => 'Api\CategoryController@update'
      )
    );  
    // D
    // destroy specific category
    Route::post(
      'product/category/destroy',
      array(
        'uses' => 'Api\CategoryController@destroy'
      )
    );
    /*==========  end category  ==========*/
    

    // admin articles page: show all articles, CRUD
    Route::get('articles', function () {
      return view('Admin/articles');
    });


    // admin single article page: show single article, CRUD
    // fix: with id
    Route::get('article', function () {
      return view('Admin/article');
    });


    // admin orders page: show all orders
    Route::get('orders', function () {
      return view('Admin/orders');
    });


    // admin single order page: show single order
    // fix: with id
    Route::get('order', function () {
      return view('Admin/order');
    });


    // admin users page: show all users
    Route::get('users', function () {
      return view('Admin/users');
    });
});
/*-----  End of backend  ------*/
