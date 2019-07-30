<?php

namespace Media\Library;

use Media\Library\Contracts\DeckInterface;
use Media\Library\Contracts\FactoryInterface;
use Media\Library\Contracts\ShuffleStrategyInterface;

/**
 * Create an instance of a deck that encapsulates logic dealing with interacting with a deck of cards
 *
 * Class DeckFactory
 * @package Media\Library
 */
class DeckFactory implements FactoryInterface
{
    /**
     * Suit ascribed to cards
     */
    public const SUITS = [
        'Clubs' => 1,
        'Diamonds' => 2,
        'Hearts' => 3,
        'Spades' => 4
    ];

    /**
     * Valuation associated to picture
     *
     * @var array
     */
    public static $pictures = [
        'Jack' => 11,
        'Queen' => 12,
        'King' => 13,
        'Ace' => 14
    ];

    /**
     * Create an array that contains a
     *
     * @param ShuffleStrategyInterface $shuffler
     * @return DeckInterface
     */
    public function create(ShuffleStrategyInterface $shuffler): DeckInterface
    {
        $deck = [];
        foreach (static::SUITS as $suit => $value) {
            for ($i = 2; $i <= 10; $i++) {
                $deck[] = new Card($suit, (string)$i, $i);
            }
            foreach (static::$pictures as $picture => $value) {
                $deck[] = new Card($suit, $picture, $value, true);
            }
        }

        return new Deck($shuffler, $deck);
    }
}