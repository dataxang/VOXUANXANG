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
    public function edit($id)
    {
        $user = User::find($id);
        $employeeType = EType::find($user->employeetype_id);
        if (is_null($user))
        {
            return Redirect::route('users.index');
        }
       // return "dddd";
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
            $salary->net_salary = $salary->basic_salary;
        }


        if(Input::has('hourly_work')&&Input::has('wage'))
        {
            //FOR employee_type =2
            $salary->worked_hour = Input::get('hourly_work');
            $salary->basic_salary = Input::get('wage');
            if($salary->worked_hour >40)
            {
                $salary->net_salary =  ($salary->worked_hour -40) *  $salary->basic_salary *1.5 +  $salary->basic_salary*$salary->worked_hour;
            }
            else{
                $salary->net_salary =    $salary->basic_salary*$salary->worked_hour;
            }
        }


        if(Input::has('commission_rate')&&Input::has('basic_salary')&&Input::has('gross_saled'))
        {
            //FOR employee_type =3
            $salary->basic_salary = Input::get('basic_salary');
            $salary->gross_sale = Input::get('gross_saled');
            $salary->commission_rate = Input::get('commission_rate');
            $salary->net_salary = $salary->basic_salary + $salary->commission_rate*$salary->gross_sale;
        }

        //Calculate net salary after paying National Pesnion (NP)

        if($salary->net_salary < 2000)
        {
            //net salary for National Pesion (NP) is:
            $salaryNP = 0.05 * $salary->net_salary ;
        }

        if(( $salary->net_salary >= 2000)&&( $salary->net_salary < 6000))
        {
            $salaryNP = 0.065 * $salary->net_salary ;
        }


        if(( $salary->net_salary >= 6000)&&( $salary->net_salary < 10000))
        {
            $salaryNP = 0.075 * $salary->net_salary ;
        }

          //Calculate net salary after paying Tax

        if($salary->net_salary < 5000)
        {
            //net salary for Tax is:
            $salaryTax = 0.05 * $salary->net_salary ;
        }

        if(( $salary->net_salary >= 5000)&&( $salary->net_salary < 10000))
        {
            $salaryTax = 0.1 * $salary->net_salary ;
        }


        if(( $salary->net_salary >= 10000)&&( $salary->net_salary < 20000))
        {
            $salaryTax = 0.15 * $salary->net_salary ;
        }
        //Real salary

       /* echo($salaryNP);echo("</br>");
        echo($salaryTax);
        dd($salary->net_salary );*/
        $salary->net_salary = $salary->net_salary  - $salaryNP -   $salaryTax ;


        $salary->comment = Input::get('comment');

        $salary->user_id = Input::get('id');

        //dd($salary->net_salary);
        $salary->save();
        //Session::flash('message', 'My message');
        return Redirect::back()->with('message','Save Successful !');
    }



}