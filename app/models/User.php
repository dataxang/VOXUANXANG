<?php
 use Illuminate\Database\Eloquent\Model;
class User extends  Model{
    public $table ='tbl_user';
    public static function checkIfLogInOk($user_input,$password){

            $check = User::where('username','=',$user_input)->where('password','=',$password)->where('isaccountant','=','1')->count();

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

  /*  public static function checkIfExistEmail($email){
        if(User::where('email','=',$email)->count()>0)
            return false;
        else return true;
    }*/

    public function getEmployee($employeeID){
        try {
            $result =  User::where('id','=',$employeeID)->first();
              $arrToReceiver = array();
                foreach ($result as $row) {
                $arrToReceiver[] = $row;
                }
            return (array)$arrToReceiver[7];
        } catch (Exception $e) {
            echo 'ERROR: '. $e->getMessage();
            return false;
        }
    }


}