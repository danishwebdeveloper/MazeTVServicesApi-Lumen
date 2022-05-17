<?php

use Illuminate\Support\Facades\Http;

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

    public function test_returns_message_if_result_equals_to_null()
    {
        $this->call('GET', '/tvmazeshow/?q=')->assertSee('Missing required parameters: q');
    }

    public function test_non_typo_tolerant_result()
    {
        $this->assertCount(3, Http::get("http://api.tvmaze.com/search/shows?q=deadwood")->json());

        $this->assertCount(1, $this->call('GET', '/tvmazeshow?q=deadwood')->json());
    }

}