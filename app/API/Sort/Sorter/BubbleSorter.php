<?php

namespace App\API\Sort\Sorter;


/**
 * Class BubbleSorter
 * @package app\API\Sort\Sorter
 */
class BubbleSorter implements Sorter
{
    /**
     * @param array $toSort
     * @return array
     */
    public function sort(array $toSort)
    {
        $n = count($toSort);

        do {
            $swapped = false;

            for ($i = 0; $i < $n - 1; $i++) {
                if ($toSort[$i] > $toSort[$i + 1]) {
                    $temp = $toSort[$i];
                    $toSort[$i] = $toSort[$i + 1];
                    $toSort[$i + 1] = $temp;
                    $swapped = true;
                }
            }
            $n--;
        } while ($swapped);

        return $toSort;
    }
}