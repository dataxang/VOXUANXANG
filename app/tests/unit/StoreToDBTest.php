<?php

include_once("SalaryBase.php");
class StoreToDBTest extends  SalaryBase {
    /*
     * @todo list:
     * A KIND OF INTEGRATION TEST
     * test should return message when input salary is wrong
     * test should return message when input too large salary
     * test should return message save successfully when save ok
     *  */

    /**
     * @author XangVo
     * @todo test should return message when input salary is wrong
     *
     * @access public
     */
    public function testShouldReturnMessageWhenInputSalaryIsWrong()
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
        $actual = $salary->store($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return message when input too large salary
     *
     * @access public
     */
    public function testShouldReturnMessageWhenInputTooLargeSalary()
    {
        // GIVEN
        $expected = 'This salary is not in Scope of salary !';

        $input = array(
            'id' =>  '4',
            'salary' =>  '50000',
            'comment' =>  '500$'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->store($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return message save successfully when save ok
     *
     * @access public
     */
    public function testShouldReturnMessageSaveSuccessfullyWhenSaveOk()
    {
        // GIVEN
        $expected = "Saved successfully!";

        $input = array(
            'id' =>  '4',
            'salary' =>  '500',
            'comment' =>  '500$'
        );


        $salary = new SalaryController();
        // WHEN
        $actual = $salary->store($input);
        // THEN
        $this->assertEquals($expected,$actual);
    }

}