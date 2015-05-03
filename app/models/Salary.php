<?php
class Salary  extends  Eloquent{

    public $table ='tbl_weeklysalary';

    //not using timestamp
    public $timestamps = false;

   /* public $net_salary;
    public $gross_salary;
    public $comment;
    public $created_date;
    public $user_id;

    //Them vao !!!
    public function  setComment ($comment)
    {
        $this->comment = $comment;
    }

    public function  setGrossSalary($grossSalary)
    {
        $this->gross_salary = $grossSalary;
    }
    public function  setNetSalary($netSalary)
    {
        $this->net_salary = $netSalary;
    }

    public function  setCreatedDate($created_date)
    {
        $this->created_date = $created_date;
    }

    public function  setUserID($user_id)
    {
        $this->user_id = $user_id;
    }*/
}