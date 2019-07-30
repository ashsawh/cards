<?php

namespace Media\Library\Ancestors;

use Media\Library\Contracts\CardInterface;
use Media\library\contracts\SortingStrategyInterface;

/**
 * Abstract class that contains the main sorting algorithm used for shuffling.
 *
 * Class AbstractShuffleStrategy
 * @package Media\Library\Ancestors
 */
abstract class AbstractSortStrategy implements SortingStrategyInterface
{
    /**
     * Algorithm used is an Insertion sort over buck and selection as it offers more performance and malleability to
     * perform multi-level ordering
     *
     * @param array $cards
     * @param bool $value
     */
    public function sort(array &$cards, bool $value = true): void
    {
        /**
         * Insertion algorithm performs comparison from a marker placed on the left side of the array which is then
         * swapped as it moves left if it is more than marker. The swapping occurs in a loop in the while loopd while
         * the final swap occurs at the last step of the marker loop.
         */
        for ($i = 1; $i < count($cards); $i++) {
            $j = $i - 1;
            $card = $cards[$i];

            while ($j >= 0 && $this->compare($card, $cards[$j])) {
                $cards[$j + 1] = $cards[$j];
                $j--;
            }

            $cards[$j + 1] = $card;
        }
    }

    /**
     * Contains various comparative methods that can be used
     *
     * @param CardInterface $card1
     * @param CardInterface $card2
     * @return mixed
     */
    abstract protected function compare(CardInterface $card1, CardInterface $card2);
}