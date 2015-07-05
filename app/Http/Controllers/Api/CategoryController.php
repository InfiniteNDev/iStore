<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Models\Category;

class CategoryController extends Controller
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
        return view('Admin/Product/Category/index')
            -> with('categories', Category::paginate(5));
    }

    /**
     * Create a new resource.
     * post
     *
     * @return Response
     */
    public function create()
    {
        $validator = Validator::make(Input::all(), Category::$rules);

        if ($validator->passes()) {
            $category = new Category;
            $category->name = Input::get('name');
            $category->save();

            return Redirect::to('admin/product/category')
                -> with('message', 'Category ' . $category->name . ' created.');
        }

        return Redirect::to('admin/product/category')
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
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
         $validator = Validator::make(Input::all(), Category::$rules);

        if ($validator->passes()) {
            $category = Category::find(Input::get('id'));
            $category->name = Input::get('name');
            $category->save();

            return Redirect::to('admin/product/category')
                -> with('message', 'Category ' . $category->name . ' updated.');
        }

        return Redirect::to('admin/product/category')
            -> with('message', 'Something went wrong, please try again.')
            -> withErrors($validator)
            -> with('categories', Category::all());
    }

    /**
     * Remove the specified resource from storage.
     * post
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        $category = Category::find(Input::get('id'));

        if ($category) {
            $category->delete();
            return Redirect::to('admin/product/category')
                -> with('message', 'Category ' . $category->name . ' deleted.');
        }

        return Redirect::to('admin/product/category')
            -> with('message', 'Something went wrong, please try again.');
    }



}
