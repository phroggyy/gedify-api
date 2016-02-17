<?php

namespace App\API\Sort\Controllers;

use App\API\Sort\Requests\SortRequest;
use App\API\Common\Controller;
use App\API\Sort\Sorter\BubbleSorter;

/**
 * Class SortController
 * @package App\API\Sort\Controllers
 */
class SortController extends Controller
{


    /**
     * @param SortRequest $request
     * @param BubbleSorter $bubbleSorter
     * @return \Illuminate\Http\JsonResponse
     */
    public function bubble(SortRequest $request, BubbleSorter $bubbleSorter)
    {
        $toSort = $request->get('input');
        $sorted = $bubbleSorter->sort($toSort);

        return response()->json([
            'input' => $toSort,
            'output' => $sorted
        ]);
    }
}
