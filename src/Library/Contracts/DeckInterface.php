<?php

namespace Media\Library\Contracts;
/**
 * Interface DeckInterface
 * @package Media\Library\Contracts
 */
interface DeckInterface
{
    /**
     * @return CardInterface
     */
    public function dealOne(): ?CardInterface;

    /**
     * @return array
     */
    public function display(): void;

    /**
     * @return void
     */
    public function shuffle(): DeckInterface;
}