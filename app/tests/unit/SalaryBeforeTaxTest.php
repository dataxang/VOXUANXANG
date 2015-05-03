<?php

include_once("SalaryBase.php");
class SalaryBeforeTaxTest extends  SalaryBase{

    /*
     * todo list:
     * test should calculate salary before tax when gross salary is less then 2000
     * test should calculate salary before tax when gross salary is less then 6000 and more than 2000
     * test should calculate salary before tax when gross salary is less then 10000 and more than 6000
     * test should calculate salary before tax when gross salary is more then 10000
     * */

    /**
     * @author XangVo
     * @todo test should calculate salary before tax for normal employee
     *
     * @access public
     */
    public function testShouldCalculateSalaryBeforeTaxWhenGrossSalaryIsLessThan2000()
    {
        // GIVEN
        $expected = 1425;

        $grossSalary = 1500;


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->SalaryBeforeTax($grossSalary);
        // THEN
        $this->assertEquals($expected,$actual);
    }


    /**
     * @author XangVo
     * @todo test should calculate salary before tax when gross salary is less then 6000 and more than 2000
     *
     * @access public
     */
    public function testShouldCalculateSalaryBeforeTaxWhenGrossSalaryIsLessThen6000AndMoreThan2000()
    {
        // GIVEN
        $expected = 5142.5;

        $grossSalary = 5500;


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->SalaryBeforeTax($grossSalary);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should calculate salary before tax when gross salary is less then 10000 and more than 6000
     *
     * @access public
     */
    public function testShouldCalculateSalaryBeforeTaxWhenGrossSalaryIsLessThen10000AndMoreThan6000()
    {
        // GIVEN
        $expected = 6937.5;

        $grossSalary = 7500;


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->SalaryBeforeTax($grossSalary);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should calculate salary before tax when gross salary is more then 10000
     *
     * @access public
     */
    public function testShouldCalculateSalaryBeforeTaxWhenGrossSalaryIsMoreThen10000()
    {
        // GIVEN
        $expected = 'This salary is not in Scope of salary !';

        $grossSalary = 15000;


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->SalaryBeforeTax($grossSalary);
        // THEN
        $this->assertEquals($expected,$actual);
    }
}