<?php

namespace App\Http\Controllers;

use App\Services\TVMazeService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function index(Request $request)
    {
        if (!$request->q) {
            return $this->errorResponse('Missing required parameters: q', Response::HTTP_BAD_REQUEST);
        } else {

            return $this->successResponse($this->tvmazeService->obtainTvShows($request->all()));

        }
    }
}