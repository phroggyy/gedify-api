<?php

namespace app\API\Sort\Sorter;

/**
 * Interface Sorter
 * @package app\API\Sort\Sorter
 */
interface Sorter
{
    /**
     * @param array $toSort
     * @return mixed
     */
    public function sort(array $toSort);
}