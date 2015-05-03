<?php

include_once("SalaryBase.php");
class GrossSalaryBySaleSalaryTest  extends  SalaryBase {
    /*
     * todo list:
     * test should calculate gross salary for sale employee
     * @autho XangVo
     * */

    /**
     * @author XangVo
     * @todo test should calculate gross salary for sale employee
     *
     * @access public
     */
    public function testShouldCalculateGrossSalaryForSaleEmployee()
    {
        // GIVEN
        $expected = 250;

        $input = array(
            'id' =>  '8',
            'basic_salary' =>  '200',
            'gross_saled' =>  '1000',
            'commission_rate' =>  '0.05',
            'comment' =>  '200 1000 0.05 sale'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->GrossSalary($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }
}