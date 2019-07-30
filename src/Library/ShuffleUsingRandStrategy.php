<?php

namespace Media\library;

use Media\library\contracts\ShuffleStrategyInterface;

/**
 * Shuffle using the random algorithm provided by PHP. The deck is looped through and then cards swapped.
 *
 * Class ShuffleUsingRandStrategy
 * @package Media\library
 */
class ShuffleUsingRandStrategy implements ShuffleStrategyInterface
{
    /**
     * Shuffling algorithm that uses mt_rand from php to seed a random number. From there, a card is chosen at random
     * and then swapped at current position.
     *
     * @param array $cards
     */
    public function shuffle(array &$cards): void
    {
        $i = count($cards);

        while(--$i) {
            $j = mt_rand(0, $i);

            if ($i != $j) {
                $swap = $cards[$j];
                $cards[$j] = $cards[$i];
                $cards[$i] = $swap;
            }
        }
    }
}