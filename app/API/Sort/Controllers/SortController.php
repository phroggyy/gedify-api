<?php

namespace App\API\Sort\Controllers;

use App\API\Sort\Requests\SortRequest;
use App\API\Common\Controller;

/**
 * Class SortController
 * @package App\API\Sort\Controllers
 */
class SortController extends Controller
{


    /**
     * @param SortRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bubble(SortRequest $request)
    {
        $toSort = $request->get('input');

        $n = count($toSort);

        do {
            $swapped = false;

            for($i = 0; $i < $n-1; $i++) {
                if($toSort[$i] > $toSort[$i+1]) {
                    $temp = $toSort[$i];
                    $toSort[$i] = $toSort[$i+1];
                    $toSort[$i+1] = $temp;
                    $swapped = true;
                }
            }
            $n--;
        }while($swapped);

        return response()->json([
            'input' => $request->get('input'),
            'output' => $toSort
        ]);
    }
}
