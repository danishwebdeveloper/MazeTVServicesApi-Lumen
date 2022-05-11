<?php

namespace App\Http\Controllers;

use App\Services\TVMazeService;
use App\Traits\ApiResponser;

class TvMazeController extends Controller
{
    use ApiResponser;

    public $tvmazeService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TVMazeService $tvmazeService)
    {
        $this->tvmazeService = $tvmazeService;
    }

    public function index()
    {
        return $this->successResponse($this->tvmazeService->obtainTvShows());
    }
}