<?php

namespace Media\Library;

use Media\Library\Contracts\CardInterface;

/**
 * ValueObject containing data pertaining to the card itself
 *
 * Class Card
 * @package Media\Library
 */
class Card implements CardInterface
{
    /**
     * @var bool
     */
    protected $dealt = false;
    /**
     * @var bool
     */
    protected $picture = false;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var int
     */
    protected $value;
    /**
     * @var string
     */
    protected $suit;

    /**
     * Card constructor.
     * @param string $suit
     * @param string $type
     * @param int $value
     * @param bool $picture
     */
    public function __construct(string $suit, string $type, int $value, bool $picture = false)
    {
        $this->type = $type;
        $this->suit = $suit;
        $this->value = $value;
        $this->picture = $picture;
    }

    /**
     * Display the type and suit of the card
     *
     * @return string
     */
    public function display(): string
    {
        return $this->type . " of {$this->suit}";
    }

    /**
     * Set the card as having been dealth
     *
     * @return $this|CardInterface
     */
    public function setDealt(): CardInterface
    {
        $this->dealt = true;
        return $this;
    }

    /**
     * Get the vard value, be it numeric or picture
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Return if the card has been dealt from the deck
     *
     * @return bool
     */
    public function isDealt(): bool
    {
        return $this->dealt;
    }

    /**
     * Return if card is a picture card or not
     *
     * @return bool
     */
    public function isPicture(): bool
    {
        return $this->picture;
    }

    /**
     * Get the suit of the card be it Diamonds, Clubs, Spades or Hearts
     *
     * @return string
     */
    public function getSuit(): string
    {
        return $this->suit;
    }
}