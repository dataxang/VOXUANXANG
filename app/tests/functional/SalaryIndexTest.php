<?php

include_once(__DIR__ . "/../TestCase.php");
class SalaryIndexTest  extends  TestCase{

    /**
     * @author XangVo
     * @todo test should return to list employee when call salary link
     *
     * @access public
     */
    public function testShouldReturnToListEmployeeWhenCallSalaryLink()
    {
        // GIVEN

        // WHEN
        $crawler = $this->client->request('GET', 'http://localhost/salary');
        // THEN
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("All Employees")')->count()
        );
    }
}