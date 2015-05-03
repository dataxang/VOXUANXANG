<?php

include_once("SalaryBase.php");
class NetSalaryTest  extends  SalaryBase{

   /*
    * todo list:
    * test calculate net salary when salary before tax is less than 5000
    * test calculate net salary when salary before tax is less than 10000 and more than 5000
    * test calculate net salary when salary before tax is less than 20000 and more than 10000
    * */

    /**
     * @author XangVo
     * @todo test calculate net salary when salary before tax is less than 5000
     *
     * @access public
     */
    public function testCalculateNetSalaryWhenSalaryBeforeTaxIsLessThan5000()
    {
        // GIVEN
        $expected = 1900;

        $salaryBeforeTax = 2000;


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->NetSalary($salaryBeforeTax);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test calculate net salary when salary before tax is less than 10000 and more than 5000
     *
     * @access public
     */
    public function testCalculateNetSalaryWhenSalaryBeforeTaxIsLessThan10000AndMoreThan5000()
    {
        // GIVEN
        $expected = 7200;

        $salaryBeforeTax = 8000;


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->NetSalary($salaryBeforeTax);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test calculate net salary when salary before tax is less than 20000 and more than 10000
     *
     * @access public
     */
    public function testCalculateNetSalaryWhenSalaryBeforeTaxIsLessThan20000AndMoreThan10000()
    {
        // GIVEN
        $expected = 12750;

        $salaryBeforeTax = 15000;


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->NetSalary($salaryBeforeTax);
        // THEN
        $this->assertEquals($expected,$actual);
    }



}