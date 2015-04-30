<?php
include_once(__DIR__ . "/../TestCase.php");
include_once(__DIR__ . "/../../configure.php");
include_once(__SITE_PATH . '/models/User.php');



class UsersBase extends TestCase
{

    public $user;

    public function setUp()
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