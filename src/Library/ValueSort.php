<?php

namespace Media\Library;

use Media\library\contracts\SortingStrategyInterface;

class ValueSort implements SortingStrategyInterface
{
    public function sort(array &$cards): void
    {
        $set = [];
        foreach ($cards as $card) {
            $set[$card->getValue() + DeckFactory::SUITS[$card->getSuit()]] = $;
        }
    }

    protected function quickSort(&$array): array
    {
        /**
         * Array must have more than one item to be sorted.
         */
        if (count($array) < 2) {
            return $array;
        }

        /**
         * Create a pivot to half the array to create a left and right. Pivot in this case is the middle.
         */
        $key = floor(count($array) / 2);
        $pivot = $array[$key];
        unset($array[$key]);
        $left = $right = [];

        /**
         * Split the array by the pivot key
         */
        foreach ($array as $value) {
            if ($value < $pivot) {
                $left[] = $value;
            } else {
                $right[] = $value;
            }
        }

        /**
         * Each array half has to be sorted by the algorithm, called recursively, until it drops to one element. Once
         * sort concludes the results are rolled upwards, merged and returned
         */
        return array_merge($this->quickSort($left), [$pivot], $this->quickSort($right));
    }
}