<?php


class EmployeeController extends \BaseController {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(10);
        //dd($users);
        return View::make('home', compact('users'));
    }
    public  function CalculateSalary(){
        return View::make('employee.salary');
    }
}