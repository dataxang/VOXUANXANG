<?php
include_once(__DIR__ . "/../TestCase.php");
include_once(__DIR__ . "/../../configure.php");
include_once(__SITE_PATH . '/models/User.php');


class EmployeeTypeBase extends TestCase{

    /*
 * @todo :
 * should return true when user has been already in DB
 * should return false when user has not been already in DB
 * */
    /**
     * @author XangVo
     * @todo test should return true when user has been already in DB
     *
     * @access public
     */
    public function testShouldReturnTrueWhenUserHasBeenAlreadyInDb()
    {
        // GIVEN
        $username = 'hieu';

        // WHEN
        $actual = User::checkIfExistUsername($username);
        // THEN
        $this->assertFalse($actual);
    }

    /**
     * @author xangVo
     * @todo test should return false when user has not been already in DB
     *
     * @access public
     */
    public function testShouldReturnFalseWhenUserHasNotBeenAlreadyInDb()
    {
        // GIVEN
        $username = 'hieuWrong';
        // WHEN
        $actual = User::checkIfExistUsername($username);
        // THEN
        $this->assertTrue($actual);
    }

}