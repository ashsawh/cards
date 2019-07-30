<?php

namespace Media\Library\Contracts;

/**
 * Contract for hand that ensures hands can display, add cards, sort by suits and values
 *
 * Interface HandInterface
 * @package Media\Library\Contracts
 */
interface HandInterface
{
    /**
     * @return array
     */
    public function display(): void;

    /**
     * @param CardInterface $card
     * @return HandInterface
     */
    public function addCard(CardInterface $card): HandInterface;

    /**
     * @return CardInterface
     */
    public function sortBySuit(): HandInterface;

    /**
     * @return CardInterface
     */
    public function sortByValue(): HandInterface;

    /**
     * @param int $len
     * @param bool $sameSuit
     * @return bool
     */
    public function hasStraight(int $len, bool $sameSuit): bool;
}