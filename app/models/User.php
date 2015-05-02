<?php
 use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\DB;
//use Validator;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Validation\Validator;
//class User extends Model {
class User extends  Model{
    public $table ='tbl_user';
    public static function check_login($user_input,$password){
        $array1 = array('user_input'=>$user_input);
        $rules = array('user_input'=>'email');

        //if(Validator::make($array1,$rules)->fails())
            $check = User::where('username','=',$user_input)->where('password','=',$password)->where('isaccountant','=','1')->count();
       // else
           // $check = User::where('email','=',$user_input)->where('password','=',$password)->count();

        if($check>0)
            return true;
        else
            return false;

    }

    public static function checkIfExistUsername($username){
        if(User::where('username','=',$username)->count()>0)
            return false;
        else return true;
    }

    public static function checkIfExistEmail($email){
        if(User::where('email','=',$email)->count()>0)
            return false;
        else return true;
    }

    public function getEmployee($employeeID){
        try {
            $result =  User::where('id','=',$employeeID)->first();
              $arrToReceiver = array();

                foreach ($result as $row) {
                $arrToReceiver[] = $row;

                }


            //dd(count($arrToReceiver));
            return (array)$arrToReceiver[7];


        } catch (Exception $e) {
            echo 'ERROR: '. $e->getMessage();
            return false;
        }
    }


}