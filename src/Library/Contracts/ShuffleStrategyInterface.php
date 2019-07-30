<?php

namespace Media\Library\Contracts;

/**
 * Contract that all shuffle algorithm strategy must adhere to
 *
 * Interface ShuffleStrategyInterface
 * @package Media\Library\Contracts
 */
interface ShuffleStrategyInterface
{
    /**
     * @param array $cards
     */
    public function shuffle(array &$cards): void;
}