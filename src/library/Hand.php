<?php

namespace Media\Library;

use Media\Library\Contracts\CardInterface;
use Media\Library\Contracts\HandInterface;
use Media\library\contracts\SortingStrategyInterface;

/**
 * Encapsulates logic around a hand of cards.
 *
 * Class Hand
 * @package Media\Library
 */
class Hand implements HandInterface
{
    /**
     * @var array
     */
    protected $cards = [];
    /**
     * @var SortingStrategyInterface
     */
    protected $suitSort;
    /**
     * @var SortingStrategyInterface
     */
    protected $valueSort;

    /**
     * Hand constructor.
     * @param SortingStrategyInterface $suitStrategy
     * @param SortingStrategyInterface $valueStrategy
     */
    public function __construct(SortingStrategyInterface $suitStrategy, SortingStrategyInterface $valueStrategy)
    {
        $this->suitSort = $suitStrategy;
        $this->valueSort = $valueStrategy;
    }

    /**
     * Display list of cards as they have been sorted or not
     *
     * @return array
     */
    public function display(): void
    {
        foreach ($this->cards as $card) {
            echo "{$card->display()} ";
        }
    }

    /**
     * Add a card to the hand
     *
     * @param CardInterface $card
     * @return HandInterface
     */
    public function addCard(CardInterface $card): HandInterface
    {
        $this->cards[] = $card;
        return $this;
    }

    /**
     * Sort cards within the hand by suit then value
     *
     * @return HandInterface
     */
    public function sortBySuit(): HandInterface
    {
        $this->suitSort->sort($this->cards);
        return $this;
    }

    /**
     * Sort cards within the hand by value then by suit
     *
     * @return HandInterface
     */
    public function sortByValue(): HandInterface
    {
        $this->valueSort->sort($this->cards);
        return $this;
    }

    /**
     * Check hand to see if it is a straight or a flush given length parameters
     *
     * @param int $len
     * @param bool $sameSuit
     * @return bool
     */
    public function hasStraight(int $len, bool $sameSuit): bool
    {
        $suits = [];
        $chained = 0;

        if (!empty($this->cards)) {
            /**
             * First create a duplicate copy of the hand so as to not overwrite. Then perform a sort on it.
             */
            $cards = $this->cards;
            $initial = $cards[0];
            $this->valueSort->sort($cards);
            $marker = $initial->getValue();

            /**
             * Loop through the cards and track if they are chained together. if they are, increment chained while tracking
             * the suit of the cards chained. Debate-able if a sort on a small set then a single loop is more efficient
             * then an inner loop without the sort
             */
            foreach ($cards as $card) {
                if ($card->getValue() === $marker) {
                    $chained++;
                    $suits[] = $card->getSuit();
                } elseif ($chained < $len) {
                    $chained = 0;
                }

                $marker++;
            }
        }

        if ($chained >= $len) {
            return $sameSuit ? count(array_unique($suits)) === 1 : true;
        } else {
            return false;
        }
    }
}