<?php
include_once(__DIR__ . "/../TestCase.php");
class GetLogOutTest  extends  TestCase{

    /**
     * @author XangVo
     * @todo test should return to login page when  log out a user
     *
     * @access public
     */
    public function testShouldReturnToLoginPageWhenLogOutAUser()
    {
        // GIVEN

        // WHEN
        $this->call('GET', 'logout');
        //THEN
        $this->assertRedirectedTo('http://localhost/login');

    }

    /**
     * @author XangVo
     * @todo test should return ok when  call a login page
     *
     * @access public
     */
    public function testShouldReturnOkWhenCallALoginPage()
    {
        // GIVEN

        // WHEN
        $crawler = $this->client->request('GET', 'http://localhost/login');
        // THEN
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Đăng nhập")')->count()
        );
    }

    /**
     * @author xangvo
     * @todo test should return to home page when  log in ok
     *
     * @access public
     */
    public function testShouldReturnToHomePageWhenLogInOk()
    {
        // GIVEN
        $client = static::createClient();
        $username = "hieu";
        $password = "123456";
        $expected = 'http://localhost/home';
        // WHEN
        $crawler = $this->client->request('GET', 'http://localhost/login');

        $form = $crawler->filter('button#dangNhap')->form(array(
            'user_input' => $username,
            'password' => $password,
        ),'POST');

         $client->submit($form);
        $actual  = $client->getResponse()->getContent();

        // THEN

        $this->assertContains($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return 2 Log In again when wrong user name or password
     *
     * @access public
     */
    public function testShouldReturn2LogInAgainWhenWrongUserNameOrPassword()
    {
        // GIVEN
        $client = static::createClient();
        $username = "hieu";
        $password = "123456wrong";
        $expected = 'Tên đăng nhập hoặc mật khẩu không đúng';
        // WHEN
        $crawler = $this->client->request('GET', 'http://localhost/login');

        $form = $crawler->filter('button#dangNhap')->form(array(
            'user_input' => $username,
            'password' => $password,
        ),'POST');

        $client->submit($form);
        $actual  = $client->getResponse()->getContent();

        // THEN

        $this->assertContains($expected,$actual);
    }

    /**
     * @author XangVo
     * @todo test should return to Register page when  click register link
     *
     * @access public
     */
    public function testShouldReturnToRegisterPageWhenClickRegisterLink()
    {
        // GIVEN
        $expected = '<a href="http://localhost:81/register">register</a>';
        // WHEN

        $actual = link_to('register', 'register');
        // THEN

        $this->assertEquals($expected, $actual);
    }

    /**
     * @author xangvo
     * @todo test should redirect to register page when  enter link
     *
     * @access public
     */
    public function testShouldRedirectToRegisterPageWhenEnterLink()
    {
        // GIVEN

        // WHEN
        $crawler = $this->client->request('GET', 'http://localhost/register');
        // THEN
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Đăng ký")')->count()
        );
    }



}