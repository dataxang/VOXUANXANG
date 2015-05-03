<?php

include_once("SalaryBase.php");
class ValidateInputFieldsTest  extends  SalaryBase{
/*
 * @todo list:
 * test should return warning when normal salary input is not numberic
 * test should return true when normal salary input is numberic
 * test should return warning when hourly salary input is not numberic
 * test should return true when hourly salary input is numberic
 * test should return warning when sale salary input is not numberic
 * test should return true when sale salary input is numberic
 * */
    /**
     * @author XangVo
     * @todo test should return warning when normal salary input is not numberic
     *
     * @access public
     */
    public function testShouldReturnWarningWhenNormalSalaryInputIsNotNumberic()
    {
        // GIVEN
        $expected = 'Salary must be numeric !';

        $input = array(
            'id' =>  '4',
            'salary' =>  '500s',
            'comment' =>  '500$'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->ValidateInputFields($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return true when normal salary input is numberic
     *
     * @access public
     */
    public function testShouldReturnTrueWhenNormalSalaryInputIsNumberic()
    {
        // GIVEN
        $expected = "true";

        $input = array(
            'id' =>  '4',
            'salary' =>  '500',
            'comment' =>  '500$'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->ValidateInputFields($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return warning when hourly salary input is not numberic
     *
     * @access public
     */
    public function testShouldReturnWarningWhenHourlySalaryInputIsNotNumberic()
    {
        // GIVEN
        $expected = 'The working hour & Wage must be numeric !';

        $input = array(
            'id' =>  '7',
            'hourly_work' =>  '45s',
            'wage' =>  '10',
            'comment' =>  '45 10 hourly'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->ValidateInputFields($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return true when hourly salary input is numberic
     *
     * @access public
     */
    public function testShouldReturnTrueWhenHourlySalaryInputIsNumberic()
    {
        // GIVEN
        $expected = "true";

        $input = array(
            'id' =>  '7',
            'hourly_work' =>  '45',
            'wage' =>  '10',
            'comment' =>  '45 10 hourly'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->ValidateInputFields($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return warning when sale salary input is not numberic
     *
     * @access public
     */
    public function testShouldReturnWarningWhenSaleSalaryInputIsNotNumberic()
    {
        // GIVEN
        $expected = 'The commission rate, basic salary and gross sales must be numeric !';

        $input = array(
            'id' =>  '8',
            'basic_salary' =>  '200',
            'gross_saled' =>  '1000s',
            'commission_rate' =>  '0.05',
            'comment' =>  '200 1000 0.05 sale'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->ValidateInputFields($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return true when sale salary input is numberic
     *
     * @access public
     */
    public function testShouldReturnTrueWhenSaleSalaryInputIsNumberic()
    {
        // GIVEN
        $expected = "true";

        $input = array(
            'id' =>  '8',
            'basic_salary' =>  '200',
            'gross_saled' =>  '1000',
            'commission_rate' =>  '0.05',
            'comment' =>  '200 1000 0.05 sale'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->ValidateInputFields($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }
}