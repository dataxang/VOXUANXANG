<?php
include_once("UsersBase.php");

class checkLoginTest extends UsersBase {
/*
 * @todo :
 * should return error when wrong accountant username and wrong password
 * should return error when wrong  accountant username and right password
 * should return error when right accountant username and wrong password
 * should return true when right  accountant username and right password
 * */

    /**
     * @author XangVo
     * @todo test should return error when wrong accountant username and wrong password
     *
     * @access public
     */
    public function testShouldReturnErrorWhenWrongAccountantUsernameAndWrongPassword()
    {
        // GIVEN
        $username = 'admin';
        $password = '123456wrong';

        $expected =  true;
        // WHEN
       $actual = User::check_login($username, md5(sha1($password)));
       // $actual = 'xang';
       // $actual = (array) $actual;
        // THEN
        $this->assertNotEquals($expected, $actual);
    }

    /**
     * @author XangVo
     * @todo test should return error when wrong  accountant username and right password
     *
     * @access public
     */
    public function testShouldReturnErrorWhenWrongAccountantUsernameAndRightPassword()
    {
        // GIVEN
        $username = 'long';
        $password = '123456';

        $expected = true;
        // WHEN
        $actual = User::check_login($username, md5(sha1($password)));

        // THEN
        $this->assertNotEquals($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return error when right accountant username and wrong password
     *
     * @access public
     */
    public function testShouldReturnErrorWhenRightAccountantUsernameAndWrongPassword()
    {
        // GIVEN
        $username = 'hieu';
        $password = '123456wrong';

        $expected = false;
        // WHEN
        $actual = User::check_login($username, md5(sha1($password)));
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
        //$actual = User::check_login($username, md5(sha1($password)));
        $actual = User::check_login($username, hash('sha256',$password));
        // THEN
        $this->assertEquals($expected,$actual);
    }
}
