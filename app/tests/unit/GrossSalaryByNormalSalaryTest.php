<?php
include_once("SalaryBase.php");

class GrossSalaryByNormalSalaryTest  extends  SalaryBase {
/*
 * todo list:
 * test should return true when input right normal salary
 * @author XangVo
 * */

    /**
     * @author XangVo
     * @todo test should return true when input right normal salary
     *
     * @access public
     */
    public function testShouldReturnTrueWhenInputRightNormalSalary()
    {
        // GIVEN
        $expected = 500;

        $input = array(
            'id' =>  '4',
            'salary' =>  '500',
            'comment' =>  '500$'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->GrossSalary($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }
}