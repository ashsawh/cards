<?php

namespace Media\Library;

use Media\Library\Ancestors\AbstractSortStrategy;
use Media\Library\Contracts\CardInterface;
use Media\library\contracts\SortingStrategyInterface;

/**
 * Sorting using Insertion strategy. Comparator logic here is designed to order by value then by suit
 *
 * Class SortUsingInsertionStrategy
 * @package Media\Library
 */
class SortSuitUsingInsertionStrategy extends AbstractSortStrategy implements SortingStrategyInterface
{
    /**
     * Compare two cards by first checking their suit value then by card value
     *
     * @param CardInterface $card1
     * @param CardInterface $card2
     * @return bool
     */
    protected function compare(CardInterface $card1, CardInterface $card2): bool
    {
        if (DeckFactory::SUITS[$card2->getSuit()] > DeckFactory::SUITS[$card1->getSuit()]) {
            return true;
        } elseif (DeckFactory::SUITS[$card2->getSuit()] === DeckFactory::SUITS[$card1->getSuit()]) {
            return $card2->getValue() > $card1->getSuit();
        } else {
            return false;
        }
    }
}