<?php
include_once(__DIR__ . "/../TestCase.php");



class SalaryBase  extends  TestCase{
    public $salary;

    public function setUp()
    {
        parent::setUp();
        $this->salary = new Salary();
    }

    /**
     * @author XangVo
     * @todo test dump test
     *
     * @access public
     */
    public function testDumpTest()
    {
        // GIVEN

        // WHEN
        $actual = false;
        // THEN
        $this->assertFalse($actual);
    }

}