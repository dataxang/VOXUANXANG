<?php
include_once("SalaryBase.php");

class GrossSalaryByHourlySalaryTest extends  SalaryBase {
    /*
     * @todo list:
     * test calculate gross salary when worked hour is more than forty
     *  test calculate gross salary when worked hour is less or equal to forty
     * */

    /**
     * @author XangVo
     * @todo test calculate gross salary when worked hour is more than forty
     *
     * @access public
     */
    public function testCalculateGrossSalaryWhenWorkedHourIsMoreThanForty()
    {
        // GIVEN
        $expected = 525;

        $input = array(
            'id' =>  '7',
            'hourly_work' =>  '45',
            'wage' =>  '10',
            'comment' =>  '45 10 hourly'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->GrossSalary($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test calculate gross salary when worked hour is less or equal to forty
     *
     * @access public
     */
    public function testCalculateGrossSalaryWhenWorkedHourIsLessOrEqualToForty()
    {

        // GIVEN
        $expected = 300;

        $input = array(
            'id' =>  '7',
            'hourly_work' =>  '30',
            'wage' =>  '10',
            'comment' =>  '30 10 hourly'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->GrossSalary($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

}