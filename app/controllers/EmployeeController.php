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
        return View::make('home', compact('users'));
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function salaryCalculate($id)
    {
        $user = User::find($id);
        $employeeType = EmployeeType::find($user->employeetype_id);
        if (is_null($user))
        {
            return Redirect::route('users.index');
        }
        return View::make('employee.salary', compact('user','employeeType'));
    }

}