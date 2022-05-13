<?php

class TVMazeShowAPITest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_search_tvshow_by_its_name()
    {
        $response = $this->call('GET', '/tvmazeshow?q=deadwood');
        $this->assertEquals($response[0]['show']['name'], 'Deadwood');
    }

    public function test_400_response_incase_of_invalid_request()
    {
        $response = $this->call('GET', '/tvmazeshow');
        $response->assertStatus(400);
        $response->assertSee('Missing required parameters: q');
    }

    public function test_noncase_sensitive_results()
    {
        $lowerCaseResult = $this->call('GET', '/tvmazeshow?q=deadwood');
        $uperCaseResult = $this->call('GET', '/tvmazeshow?q=DEadwood');
        $this->assertEquals($lowerCaseResult[0]['show'], $uperCaseResult[0]['show']);
    }

}