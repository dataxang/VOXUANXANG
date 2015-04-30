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
        $users = User::paginate(10);
        return View::make('employee.salary', compact('users'));
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

    public function store()
    {
        $input = array_except(Input::all(), array('_token'));
        $salary = new Salary();
        if(Input::has('salary'))
        {
            //FOR employee_type =1
            $salary->basic_salary = Input::get('salary');
            $grossSalary = $salary->basic_salary;
        }


        if(Input::has('hourly_work')&&Input::has('wage'))
        {
            //FOR employee_type =2
            $salary->worked_hour = Input::get('hourly_work');
            $salary->basic_salary = Input::get('wage');
            if($salary->worked_hour >40)
            {
                $grossSalary =  ($salary->worked_hour -40) *  $salary->basic_salary *1.5 +  $salary->basic_salary*$salary->worked_hour;
            }
            else{
                $grossSalary =    $salary->basic_salary*$salary->worked_hour;
            }
        }


        if(Input::has('commission_rate')&&Input::has('basic_salary')&&Input::has('gross_saled'))
        {
            //FOR employee_type =3
            $salary->basic_salary = Input::get('basic_salary');
            $salary->gross_sale = Input::get('gross_saled');
            $salary->commission_rate = Input::get('commission_rate');
            $grossSalary = $salary->basic_salary + $salary->commission_rate*$salary->gross_sale;
        }

        //Calculate net salary after paying National Pesnion (NP)

        if($grossSalary < 2000)
        {
            $salaryBeforeTax = 0.95 * $grossSalary ;
        }

        if(( $grossSalary >= 2000)&&( $grossSalary < 6000))
        {
            $salaryBeforeTax = 0.935 * $grossSalary ;
        }


        if(( $grossSalary >= 6000)&&( $grossSalary < 10000))
        {
            $salaryBeforeTax = 0.925 * $grossSalary ;
        }

          //Calculate net salary after paying Tax

        if($salaryBeforeTax < 5000)
        {
            $NetSalary = 0.95 * $salaryBeforeTax ;
        }

        if(( $salaryBeforeTax >= 5000)&&( $salaryBeforeTax < 10000))
        {
            $NetSalary = 0.9 * $salaryBeforeTax ;
        }
        if(( $salaryBeforeTax >= 10000)&&( $salaryBeforeTax < 20000))
        {
            $NetSalary = 0.85 * $salaryBeforeTax ;
        }
        $salary->net_salary = $NetSalary ;
        $salary->gross_salary =   $grossSalary ;

        $salary->comment = Input::get('comment');
        $salary->created_date = date('Y-m-d');
        $salary->user_id = Input::get('id');

        $salary->save();
        return Redirect::back()->with('message','Save Successful !');
    }



}