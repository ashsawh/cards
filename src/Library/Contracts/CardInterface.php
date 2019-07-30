<?php

namespace Media\Library\Contracts;

/**
 * Contract that card ValueObject must adhere to
 *
 * Interface CardInterface
 * @package Media\Library\Contracts
 */
interface CardInterface
{
    /**
     * @return string
     */
    public function display(): string;

    /**
     * @return CardInterface
     */
    public function setDealt(): CardInterface;

    /**
     * @return int
     */
    public function getValue(): int;

    /**
     * @return bool
     */
    public function isDealt(): bool;

    /**
     * @return bool
     */
    public function isPicture(): bool;

    /**
     * @return string
     */
    public function getSuit(): string;
}