<?php
include_once(__SITE_PATH . '/../../models/User.php');
class checkLoginTest extends PHPUnit_Framework_TestCase {
/*
 * @todo :
 * should return error when wrong accountant username and wrong password
 * should return error when wrong  accountant username and right password
 * should return error when right accountant username and wrong password
 * should return true when right  accountant username and right password
 * */

    /**
     * @author HMLong
     * @todo test should return error when wrong accountant username and wrong password
     *
     * @access public
     */
    public function testShouldReturnErrorWhenWrongAccountantUsernameAndWrongPassword()
    {
        // GIVEN
        $username = 'admin';
        $password = '123456';

        $expected =  false;
        // WHEN
        //$actual = User::check_login($username, $password);
        $actual = (array) $actual;
        // THEN
        $this->assertNotEquals($expected, $actual);
    }
}
