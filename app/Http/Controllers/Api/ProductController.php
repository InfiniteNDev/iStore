<?php

namespace App\Http\Controllers\Api;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Api\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

use App\Models\Product;
use App\Models\Category;

use File;

class ProductController extends Controller
{

    public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // show view
        if (Request::is('admin*')) {
            return view('admin/product/products')
                -> with('products', Product::paginate(9));
        }
        return view('front/product/products')
            -> with('products', Product::paginate(9));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function showNew()
    {
        // show view
        return view('admin/product/new');
    }

    /**
     * create product
     * 
     * @return [type] [description]
     */
    public function create()
    {
        $validator = Validator::make(Input::all(), Product::$rules);

        if ($validator->passes()) {
            $product = new Product;

            $product->title = Input::get('title');
            $product->category_id = Input::get('category_id');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->discount = Input::get('discount');
            $product->stock = Input::get('stock');
            $product->availability = Input::get('availability');
            
            $image = Input::file('image');
            if ($image) {
                $filename = $image->getClientOriginalName();
                $path = public_path('assets/images/products/' . $filename);

                // echo dd(is_writable(public_path('assets/images/products')));

                Image::make($image->getRealPath())
                    -> resize(200, 200)
                    -> save($path);
                
                $product->image = 'assets/images/products/' . $filename;

            }

            $product->save();

            return Redirect::to('admin/product/products')
                -> with('message', 'Product ' . $product->title . ' created.');
        }

        return Redirect::back()
            -> with('message', 'Something went wrong, please try again.')
            -> withErrors($validator)
            -> withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        // show view
        return view('front/product/product')
            -> with('product', Product::find(Input::get('id')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        // show view
        return view('admin/product/edit')
            -> with('product', Product::find(Input::get('id')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
        $validator = Validator::make(Input::all(), Product::$rules);

        if ($validator->passes()) {
            $product = Product::find(Input::get('id'));

            $product->title = Input::get('title');
            $product->category_id = Input::get('category_id');
            $product->description = Input::get('description');
            $product->price = Input::get('price');
            $product->discount = Input::get('discount');
            $product->stock = Input::get('stock');
            $product->availability = Input::get('availability');
            
            $image = Input::file('image');
            if ($image) {
                $filename = date('Y-m-d-H-i-s') . "-" . $image->getClientOriginalName();
                $path = public_path('assets/images/products/' . $filename);

                // echo dd(is_writable(public_path('assets/images/products')));

                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                
                $product->image = 'public/assets/images/products/' . $filename;
            }

            $product->save();

            return Redirect::back()
                -> withInput()
                -> with('message', 'Product ' . $product->title . ' updated.');
        }

        return Redirect::back()
            -> withInput()
            -> withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        $product = Product::find(Input::get('id'));

        if ($product) {
            // delete product image
            File::delete('public/'.$product->image);
            $product->delete();
            return Redirect::back()
                -> with('message', 'Product ' . $product->title . ' deleted.');
        }

        return Redirect::back()
            -> with('message', 'Something went wrong, please try again.');
    }

    /**
     * toggle availability
     * @return products page
     */
    public function toggleAvailability()
    {
        $product = Product::find(Input::get('id'));

        if ($product) {
            // delete product image
            $product->availability = Input::get('availability');
            $product->save();
            return Redirect::to('admin/product/products')
                -> with('message', 'Product ' . $product->title . ' updated.');
        }

        return Redirect::to('admin/product/products')
            -> with('message', 'Something went wrong, please try again.');
    }

    /**
     * redirect to other pages depending on action
     * 
     * @return other page
     */
    public function buyorcart()
    {
        // check if buy or add to cart
        $if_buy = !empty(Input::get('buy'));
        $if_cart = !empty(Input::get('cart'));
        // if buy, buy
        if ($if_buy)
        {
            return "buy";
        }
        // if cart, add to cart
        if ($if_cart)
        {
            $CartController = app()->make('App\Http\Controllers\Front\CartController');
            $arguments      = Input::all();
            return app()->call([$CartController, 'create'], $arguments);
        }
    }
}
