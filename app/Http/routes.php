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

// frontend
// frontend's homepage
Route::get('/', function () {
  return view('index');
});

// products page: show all products
Route::get('/products', function () {
  return view('products');
});

// product's detail page: show single product
// fix: enter with id
Route::get('/product', function () {
  return view('product');
});

// articles page: show all articles
Route::get('/articles', function () {
  return view('articles');
});

// article's detial page: show single article
// fix: enter with id
Route::get('/article', function () {
  return view('article');
});

// sign page: sign up or log in
Route::get('/account', function () {
  return view('account');
});

// account page: show user's information
Route::get('/account', function () {
  return view('account');
});

// cart page: show cart
Route::get('/cart', function () {
  return view('cart');
});

// checkout page: show checkout
Route::get('/checkout', function () {
  return view('checkout');
});

// backend
// fix: only admin user could enter
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
  // admin login
  Route::get('/', function () {
    return view('admin/login');
  });

  // admin homepage
  Route::get('/', function () {
    return view('admin/admin');
  });

  // admin products page: show all products, CRUD
  Route::get('/products', function () {
    return view('admin/products');
  });

  // admin single product page: show single product, CRUD
  // fix: with id
  Route::get('/product', function () {
    return view('admin/product');
  });

  // admin articles page: show all articles, CRUD
  Route::get('/articles', function () {
    return view('admin/articles');
  });

  // admin single article page: show single article, CRUD
  // fix: with id
  Route::get('/article', function () {
    return view('admin/article');
  });

  // admin orders page: show all orders
  Route::get('/orders', function () {
    return view('admin/orders');
  });

  // admin single order page: show single order
  // fix: with id
  Route::get('/order', function () {
    return view('admin/order');
  });

  // admin users page: show all users
  Route::get('/users', function () {
    return view('admin/users');
  });
});
