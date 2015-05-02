<?php
include_once("UsersBase.php");

class GetEmployeeTest extends UsersBase {

    /*
     * @todo
     * should return employee information when  get real employee ID
     * should return false when  get wrong employee ID
     *
     * */

    /**
     * @author XangVo
     * @todo test should return employee information when  get real employee ID
     *
     * @access public
     */
    public function testShouldReturnEmployeeInformationWhenGetRealEmployeeId()
    {
        // GIVEN
        $employeeID = 4;
        $expected = [
            'id'    =>4,
            'employeetype_id'   =>1,
            'username'          =>'hieu',
            'lastname'          =>'Hieu',
            'firstname'          =>'Nguyen',
            'isaccountant'          =>1,
            'password'          =>'8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',
            'updated_at'          =>'2015-04-25',
            'created_at'          =>'2015-04-25',
            'email'          =>'hieu@gmail.com'

        ];
        // WHEN
        $result = $this->user->getEmployee($employeeID);
        $result = (array) $result;

        // THEN
        $this->assertEquals($expected,$result);
    }

    /**
     * @author XangVo
     * @todo test should return false when  get wrong employee ID
     *
     * @access public
     */
    public function testShouldReturnFalseWhenGetWrongEmployeeId()
    {
        // GIVEN
        $employeeID = 9;
        $expected = [
            'id'    =>4,
            'employeetype_id'   =>1,
            'username'          =>'hieu',
            'lastname'          =>'Hieu',
            'firstname'          =>'Nguyen',
            'isaccountant'          =>1,
            'password'          =>'8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',
            'updated_at'          =>'2015-04-25',
            'created_at'          =>'2015-04-25',
            'email'          =>'hieu@gmail.com'

        ];
        // WHEN
        $result = $this->user->getEmployee($employeeID);
        $result = (array) $result;

        // THEN
        $this->assertNotEquals($expected,$result);
    }
}