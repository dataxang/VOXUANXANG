<?php
include_once(__DIR__ . "/../configure.php");

class SalaryController  extends \BaseController{

    public function index()
    {
        $users = User::paginate(10);
        return View::make('cartdetail', compact('users'));
    }


    public function  ValidateInputFields(array $input = array())
    {

        if( isset($input['salary']) )
        {
            $rules = array(
                'salary' => 'required|numeric',
            );
            if (Validator::make($input, $rules)->fails()) {
                //Salary must be numeric!

                return WARNING1;
            }
            else
                return "true";
        }

        elseif( isset($input['hourly_work']) && isset($input['wage']) )
        {
            $rules = array(
                'hourly_work'    =>  'required|numeric',
                'wage'    =>  'required|numeric',
            );
            if ( Validator::make($input, $rules)->fails())
            {
                //Salary must be numeric!
                return WARNING2;
            }
            else
                return "true";


        }

        elseif( isset($input['basic_salary']) && isset($input['gross_saled']) && isset($input['commission_rate']) )
        {
            $rules = array(
                'commission_rate'    =>  'required|numeric',
                'basic_salary'       =>  'required|numeric',
                'gross_saled'        =>  'required|numeric',
            );
            if ( Validator::make($input, $rules)->fails())
            {
                return WARNING3;
            }
            else
                return "true";
        }
    }

    public  function GrossSalary(array $input = array())
    {
        //dd($input);
        $grossSalary = 0;
        if( isset($input['salary']) )
        {
            //FOR employee_type =1
            $grossSalary = $input['salary'];
        }


        elseif( isset($input['hourly_work']) && isset($input['wage']) )
        {
            //FOR employee_type =2
            $salary_worked_hour = $input['hourly_work'];
            $salary_basic_salary = $input['wage'];
            if( $salary_worked_hour >40 )
            {
                $grossSalary =  ($salary_worked_hour -WEEK_HOUR_FORTY) *  $salary_basic_salary *OVERTIME_RATE +  $salary_basic_salary*$salary_worked_hour;
            }
            else
            {
                $grossSalary =    $salary_basic_salary * $salary_worked_hour;
            }
        }


        elseif( isset($input['basic_salary']) && isset($input['gross_saled']) && isset($input['commission_rate']) )
        {
            //FOR employee_type =3
            $salary_basic_salary = $input['basic_salary'];
            $salary_gross_sale = $input['gross_saled'];
            $salary_commission_rate = $input['commission_rate'];
            $grossSalary = $salary_basic_salary + $salary_commission_rate * $salary_gross_sale;
        }

        return $grossSalary;

    }


    public  function SalaryBeforeTax( $grossSalary )
    {
        if($grossSalary < SALARY_TWO_THOUSANDS)
        {
            $salaryBeforeTax =  $grossSalary * (HUNDRED_VAL -PN_RATE_LEVEL1 )/HUNDRED_VAL  ;
        }

        elseif( ( $grossSalary >= SALARY_TWO_THOUSANDS) && ( $grossSalary < SALARY_SIX_THOUSANDS ) )
        {
            $salaryBeforeTax = $grossSalary * (HUNDRED_VAL -PN_RATE_LEVEL2 )/HUNDRED_VAL  ;
        }

        elseif ( ( $grossSalary >= SALARY_SIX_THOUSANDS)&&( $grossSalary < SALARY_TEN_THOUSANDS ) )
        {
            $salaryBeforeTax = $grossSalary * (HUNDRED_VAL -PN_RATE_LEVEL3 )/HUNDRED_VAL  ;
        }

        elseif( $grossSalary >= SALARY_TEN_THOUSANDS )
        {
            //Out of given salary scope.
            return OUT_OF_SALARY;



        }

        return $salaryBeforeTax;

    }

    public  function NetSalary($salaryBeforeTax)
    {

        if($salaryBeforeTax < SALARY_FIVE_THOUSANDS)
        {
            $NetSalary =  $salaryBeforeTax * (HUNDRED_VAL - TAX_RATE_LEVEL1) / HUNDRED_VAL ;
        }

        elseif(( $salaryBeforeTax >= 5000)&&( $salaryBeforeTax < 10000))
        {
            $NetSalary =  $salaryBeforeTax * (HUNDRED_VAL - TAX_RATE_LEVEL2) / HUNDRED_VAL ;
        }

        elseif(( $salaryBeforeTax >= 10000)&&( $salaryBeforeTax < 20000))
        {
            $NetSalary =  $salaryBeforeTax * (HUNDRED_VAL - TAX_RATE_LEVEL3) / HUNDRED_VAL ;
        }
        return $NetSalary;

    }


    public  function  store(array $inputFunction = array())
    {
        //This is a default function of Laravel when submit a form!!!

        $salary = new Salary();

        //Validate input fields
        $tempInputForTesting = Input::all();
        if($tempInputForTesting!=NULL)
        {
            //for browser
            $input = Input::all();
        }
        else
        {
            //for testing coverage
            $input = $inputFunction;
        }

        $validate = $this->ValidateInputFields($input);
        if($validate!="true")
        {
            if($inputFunction!=NULL)
            {
                //for testing coverage
                return WARNING1;
            }
            else
            {
                //for browser
                return Redirect::back()->with('message', $validate);
            }

        }
        else
        {
            $grossSalary = $this->GrossSalary($input);
            //Calculate net salary after paying National Pesnion (NP)

            $salaryBeforeTax = $this->SalaryBeforeTax($grossSalary);
            if($salaryBeforeTax == OUT_OF_SALARY)
            {
                if($inputFunction!=NULL)
                {
                    //for testing coverage
                    return OUT_OF_SALARY;
                }
                else
                {
                    //for browser
                    return Redirect::back()->with('message', OUT_OF_SALARY);
                }
            }
           else
           {
               //Calculate net salary after paying Tax

               $NetSalary = $this->NetSalary($salaryBeforeTax);

               //Prepare DB to store into DB.
               $salary->net_salary = $NetSalary ;
               $salary->gross_salary =   $grossSalary ;
               $salary->comment = $input['comment'];
               $salary->created_date = date('Y-m-d');
               $salary->user_id = $input['id'];

               //Save to DB

               $salary->save();
               if($inputFunction!=NULL)
               {
                   //for testing coverage
                   return SAVE_OK;
               }
               else
               {
                   //for browser
                   return Redirect::back()->with('message', SAVE_OK);

               }

           }



        }

    }

}