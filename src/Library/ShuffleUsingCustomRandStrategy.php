<?php

namespace Media\Library;

use Media\Library\Contracts\ShuffleStrategyInterface;

/**
 * Encapsulates strategy around shuffling a deck of cards
 *
 * Class ShuffleUsingCustomRandStrategy
 * @package Media\Library
 */
class ShuffleUsingCustomRandStrategy implements ShuffleStrategyInterface
{
    /**
     * Shuffling algorithm that uses a custom random. I included this in case as the parameters of the test was specific
     * in that it requested all algorithms be created
     *
     * @param array $cards
     */
    public function shuffle(array &$cards): void
    {
        for ($i = 0; $i < count($cards); $i++) {
            $random = $this->random(0, count($cards));
            $swap = $cards[$i];
            $cards[$i] = $cards[$random];
            $cards[$random] = $swap;
        }
    }

    /**
     * Generate a random integer between a min and max value.
     *
     * @param int $min
     * @param int $max
     * @return int
     */
    final protected function random(int $min, int $max): int
    {
        return (time() * 125) % 2796203 % ($max - $min + 1) + $min;
    }
}