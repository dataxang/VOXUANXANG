<?php
class ProductController  extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return View::make('listproduct', compact('products'));
    }

    public function edit()
    {
        $products = Product::paginate(10);
        return View::make('listproduct', compact('products'));
    }

}