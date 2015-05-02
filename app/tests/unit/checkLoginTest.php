<?php
include_once("UsersBase.php");

class checkLoginTest extends UsersBase {
/*
 * @todo :
 * should return false when wrong accountant username and wrong password
 * should return false when wrong  accountant username and right password
 * should return false when right accountant username and wrong password
 * should return true when right  accountant username and right password
 *
 * should return true when user has been already in DB
 * should return false when user has not been already in DB
 * */

    /**
     * @author XangVo
     * @todo test should return false when wrong accountant username and wrong password
     *
     * @access public
     */
    public function testShouldReturnFalseWhenWrongAccountantUsernameAndWrongPassword()
    {
        // GIVEN
        $username = 'admin';
        $password = '123456wrong';

        $expected =  true;
        // WHEN
       $actual = User::check_login($username, hash('sha256',$password));
        // THEN
        $this->assertNotEquals($expected, $actual);
    }

    /**
     * @author XangVo
     * @todo test should return false when wrong  accountant username and right password
     *
     * @access public
     */
    public function testShouldReturnFalseWhenWrongAccountantUsernameAndRightPassword()
    {
        // GIVEN
        $username = 'long';
        $password = '123456';

        $expected = true;
        // WHEN
        $actual = User::check_login($username,hash('sha256',$password));

        // THEN
        $this->assertNotEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return false when right accountant username and wrong password
     *
     * @access public
     */
    public function testShouldReturnFalseWhenRightAccountantUsernameAndWrongPassword()
    {
        // GIVEN
        $username = 'hieu';
        $password = '123456wrong';

        $expected = false;
        // WHEN
        $actual = User::check_login($username,hash('sha256',$password));
        // THEN
        $this->assertEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return true when right  accountant username and right password
     *
     * @access public
     */
    public function testShouldReturnTrueWhenRightAccountantUsernameAndRightPassword()
    {
        // GIVEN
        $username = 'hieu';
        $password = '123456';

        $expected = true;
        // WHEN
        $actual = User::check_login($username, hash('sha256',$password));
        // THEN
        $this->assertEquals($expected,$actual);
    }


    /**
     * @author XangVo
     * @todo test should return false when user has been already in DB
     *
     * @access public
     */
    public function testShouldReturnFalseWhenUserHasBeenAlreadyInDb()
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
     * @todo test should return true when user has not been already in DB
     *
     * @access public
     */
    public function testShouldReturnTrueWhenUserHasNotBeenAlreadyInDb()
    {
        // GIVEN
        $username = 'hieuWrong';
        // WHEN
        $actual = User::checkIfExistUsername($username);
        // THEN
        $this->assertTrue($actual);
    }


}
