<?php

namespace App\API\Strings\Controllers;

use App\API\Strings\Requests\ReverseRequest;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Handle a request to reverse a string.
     *
     * @param ReverseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reverse(ReverseRequest $request)
    {
        return response()->json([
            'input' => $request->get('input'),
            'output' => strrev($request->get('input'))
        ]);
    }
}