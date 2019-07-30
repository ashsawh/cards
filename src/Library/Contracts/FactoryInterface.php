<?php

namespace Media\Library\Contracts;

/**
 * Interface FactoryInterface
 * @package Media\Library\Contracts
 */
interface FactoryInterface
{
    /**
     * @param ShuffleStrategyInterface $shuffler
     * @return DeckInterface
     */
    public function create(ShuffleStrategyInterface $shuffler): DeckInterface;
}