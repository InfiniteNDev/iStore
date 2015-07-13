<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * create new cart item.
     *
     * @return Response
     */
    public function create()
    {
        $product = Product::find(Input::get('id'));
        $quantity = Input::get('quantity');
        $if_qty_not_exist = empty($quantity);
        if ($if_qty_not_exist) {
            $quantity = 1;
        }

        // search cart, if already has this product, add one more to cart
        $if_product_exist = Cart::search(array('id'=>$product->id));
        if ($if_product_exist) {
            $rowId = $if_product_exist[0];
            $oldQty = Cart::get($rowId)->qty;
            $newQty = $oldQty + $quantity;
            Cart::update($rowId, array(
                'qty' => $newQty
            ));
            return Redirect::to('cart')
                -> with('message', 'The product ' . $product->title . ' is alreday in cart. Now Add ' . $quantity . ' more to cart.');
        }

        Cart::add(array(
            'id'         => $product->id,
            'name'       => $product->title,
            'qty'        => $quantity,
            'price'      => $product->price,
            'options'    => array(
                'product'   => $product
            )
        ));

        return Redirect::to('cart')
            -> with('message', 'Add ' . $product->title . 'to cart.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
        $rowId = Input::get('rowid');
        $update_success = Cart::update($rowId, array('qty' => Input::get('qty')));
        if (!$update_success)
        {
            return Redirect::back()
                -> withErrors("There is something wrong.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        $rowId = Input::get('rowId');
        
        $remove_success = !Cart::remove($rowId);

        if ($remove_success) 
        {
            return Redirect::back()
                -> with('message', 'Remove item successfully.');
        }

        return Redirect::back()
            -> withErrors("There is something wrong.");
    }
}
