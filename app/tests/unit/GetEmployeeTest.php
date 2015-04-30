<?php
include_once("UsersBase.php");

class GetEmployeeTest extends UsersBase {

    /*
     * @todo
     * should return employee information when I get real employee ID
     * should return false when I get wrong employee ID
     *
     * */

    /**
     * @author XangVo
     * @todo test should return employee information when I get real employee ID
     *
     * @access public
     */
    public function testShouldReturnEmployeeInformationWhenIGetRealEmployeeId()
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
            'password'          =>'d93a5def7511da3d0f2d171d9c344e91',
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
     * @todo test should return false when I get wrong employee ID
     *
     * @access public
     */
    public function testShouldReturnFalseWhenIGetWrongEmployeeId()
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
            'password'          =>'d93a5def7511da3d0f2d171d9c344e91',
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