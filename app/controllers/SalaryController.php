<?php
include_once(__DIR__ . "/../configure.php");

class SalaryController  extends \BaseController{

    public function index()
    {
        $users = User::paginate(10);
        return View::make('home', compact('users'));
    }


    private function  ValidateInputFields()
    {
        if(Input::has('salary'))
        {
            $rules = array(
                'salary' => 'required|numeric',
            );
            if (Validator::make(Input::all(), $rules)->fails()) {
                //Salary must be numeric!

                return WARNING1;
            }
            else
                return "true";
        }

        if(Input::has('hourly_work')&&Input::has('wage'))
        {
            $rules = array(
                'hourly_work'    =>  'required|numeric',
                'wage'    =>  'required|numeric',
            );
            if ( Validator::make(Input::all(), $rules)->fails())
            {
                //Salary must be numeric!
                return WARNING2;
            }
            else
                return "true";


        }

        if(Input::has('commission_rate')&&Input::has('basic_salary')&&Input::has('gross_saled'))
        {
            $rules = array(
                'commission_rate'    =>  'required|numeric',
                'basic_salary'       =>  'required|numeric',
                'gross_saled'        =>  'required|numeric',
            );
            if ( Validator::make(Input::all(), $rules)->fails())
            {
                return WARNING3;
            }
            else
                return "true";
        }
    }

    private  function GrossSalary()
    {

        if( Input::has('salary') )
        {
            //FOR employee_type =1
            $grossSalary = Input::get('salary');
        }


        if( Input::has('hourly_work') && Input::has('wage') )
        {
            //FOR employee_type =2
            $salary_worked_hour = Input::get('hourly_work');
            $salary_basic_salary = Input::get('wage');
            if( $salary_worked_hour >40 )
            {
                $grossSalary =  ($salary_worked_hour -WEEK_HOUR_FORTY) *  $salary_basic_salary *OVERTIME_RATE +  $salary_basic_salary*$salary_worked_hour;
            }
            else
            {
                $grossSalary =    $salary_basic_salary * $salary_worked_hour;
            }
        }


        if( Input::has('commission_rate') && Input::has('basic_salary') && Input::has('gross_saled') )
        {
            //FOR employee_type =3
            $salary_basic_salary = Input::get('basic_salary');
            $salary_gross_sale = Input::get('gross_saled');
            $salary_commission_rate = Input::get('commission_rate');
            $grossSalary = $salary_basic_salary + $salary_commission_rate * $salary_gross_sale;
        }

        return $grossSalary;

    }


    private  function SalaryBeforeTax( $grossSalary )
    {
        if($grossSalary < SALARY_TWO_THOUSANDS)
        {
            $salaryBeforeTax =  $grossSalary * (HUNDRED_VAL -PN_RATE_LEVEL1 )/HUNDRED_VAL  ;
        }

        if( ( $grossSalary >= SALARY_TWO_THOUSANDS) && ( $grossSalary < SALARY_SIX_THOUSANDS ) )
        {
            $salaryBeforeTax = $grossSalary * (HUNDRED_VAL -PN_RATE_LEVEL2 )/HUNDRED_VAL  ;
        }

        if ( ( $grossSalary >= SALARY_SIX_THOUSANDS)&&( $grossSalary < SALARY_TEN_THOUSANDS ) )
        {
            $salaryBeforeTax = $grossSalary * (HUNDRED_VAL -PN_RATE_LEVEL3 )/HUNDRED_VAL  ;
        }

        if( $grossSalary >= SALARY_TEN_THOUSANDS )
        {
            //Out of given salary scope.
            return Redirect::back()->with('message','This salary is not in Scope of salary !');

        }

        return $salaryBeforeTax;

    }

    private  function NetSalary($salaryBeforeTax)
    {

        if($salaryBeforeTax < SALARY_FIVE_THOUSANDS)
        {
            $NetSalary =  $salaryBeforeTax * (HUNDRED_VAL - TAX_RATE_LEVEL1) / HUNDRED_VAL ;
        }

        if(( $salaryBeforeTax >= 5000)&&( $salaryBeforeTax < 10000))
        {
            $NetSalary =  $salaryBeforeTax * (HUNDRED_VAL - TAX_RATE_LEVEL2) / HUNDRED_VAL ;
        }

        if(( $salaryBeforeTax >= 10000)&&( $salaryBeforeTax < 20000))
        {
            $NetSalary =  $salaryBeforeTax * (HUNDRED_VAL - TAX_RATE_LEVEL3) / HUNDRED_VAL ;
        }
        return $NetSalary;

    }


    public  function  store()
    {
        //This is a default function of Laravel when submit a form!!!

        $salary = new Salary();

        //Validate input fields
        $validate = $this->ValidateInputFields();

        if($validate!="true")
        {
            return Redirect::back()->with('message', $validate);
        }
        else
        {
            $grossSalary = $this->GrossSalary();
            //Calculate net salary after paying National Pesnion (NP)

            $salaryBeforeTax = $this->SalaryBeforeTax($grossSalary);

            //Calculate net salary after paying Tax

            $NetSalary = $this->NetSalary($salaryBeforeTax);

            //Prepare DB to store into DB.
            $salary->net_salary = $NetSalary ;
            $salary->gross_salary =   $grossSalary ;
            $salary->comment = Input::get('comment');
            $salary->created_date = date('Y-m-d');
            $salary->user_id = Input::get('id');

            //Save to DB

            $salary->save();
            return Redirect::back()->with('message', SAVE_OK);

        }

    }

}