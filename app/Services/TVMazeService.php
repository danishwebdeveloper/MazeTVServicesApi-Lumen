<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class TVMazeService
{
    use ConsumeExternalServices;

    /**
     * The base uri to consume the authors service
     *
     * @var string
     */

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.tvmaze.base_uri');
    }

    /**
     * Obtain the full list of authors from the author service
     *
     * @return string
     */
    public function obtainTvShows()
    {
        return $this->performRequest("GET", "/shows");
    }
}