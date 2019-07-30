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
class SortValueUsingInsertionStrategy extends AbstractSortStrategy implements SortingStrategyInterface
{
    /**
     * Compare two cards and return if the card has a higher value then a higher suit
     *
     * @param CardInterface $card1
     * @param CardInterface $card2
     * @return bool
     */
    protected function compare(CardInterface $card1, CardInterface $card2): bool
    {
        if ($card2->getValue() > $card1->getValue()) {
            return true;
        } elseif ($card2->getValue() === $card1->getValue()) {
            return DeckFactory::SUITS[$card2->getSuit()] > DeckFactory::SUITS[$card1->getSuit()];
        } else {
            return false;
        }
    }
}