<?php


class OrderDetailController extends \BaseController{
    public function index()
    {
        $orderDetails = OrderDetail::paginate(10);
        return View::make('cartdetail', compact('orderDetails'));
    }
}