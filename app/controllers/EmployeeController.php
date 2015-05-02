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

    public function store()
    {
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
        if($grossSalary >= 10000)
        {
            //TH dac biet
            return Redirect::back()->with('message','This salary is not in Scope of salary !');

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

        if(Input::has('salary'))
        {
            $rules = array(
                'salary'    =>  'required|numeric',
            );
            if (! Validator::make(Input::all(), $rules)->fails()) {
                $salary->save();

                return Redirect::back()->with('message', 'Save Successful !');
            } else {
                //Salary must be numeric!
                return Redirect::back()->with('message', 'Salary must be numeric !');
            }
        }
        if(Input::has('hourly_work')&&Input::has('wage'))
        {
            $rules = array(
                'hourly_work'    =>  'required|numeric',
                'wage'    =>  'required|numeric',
            );
            if (! Validator::make(Input::all(), $rules)->fails()) {
                $salary->save();

                return Redirect::back()->with('message', 'Save Successful !');
            } else {
                //Salary must be numeric!
                return Redirect::back()->with('message', 'The working hour & Wage must be numeric !');
            }

        }
        if(Input::has('commission_rate')&&Input::has('basic_salary')&&Input::has('gross_saled'))
        {
            $rules = array(
                'commission_rate'    =>  'required|numeric',
                'basic_salary'    =>  'required|numeric',
                'gross_saled'    =>  'required|numeric',
            );
            if (! Validator::make(Input::all(), $rules)->fails()) {
                $salary->save();

                return Redirect::back()->with('message', 'Save Successful !');
            } else {
                //Salary must be numeric!
                return Redirect::back()->with('message', 'The commission rate & basic salary and gross sales must be numeric !');
            }
        }

    }



}