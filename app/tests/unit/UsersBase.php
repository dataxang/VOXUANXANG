<?php
include_once(__DIR__ . "/../TestBase.php");
include_once(__SITE_PATH . '/models/Users.php');

class UsersBase extends TestBase
{

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        // Init or Start Rollback Data If your wanna
        $this->user = new User();
    }

    protected function tearDown()
    {
        parent::tearDown();
        // Rollback Data If your wanna
    }
}