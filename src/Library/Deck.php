<?php

namespace Media\Library;

use Media\Library\Contracts\CardInterface;
use Media\Library\Contracts\DeckInterface;
use Media\Library\Contracts\ShuffleStrategyInterface;

/**
 * Encapsulates all logic that is related to the deck of cards. Instantiated by DeckFactory
 *
 * Class Deck
 * @package Media\Library
 */
class Deck implements DeckInterface
{
    /**
     * @var bool
     */
    protected $shuffled = false;
    /**
     * @var ShuffleStrategyInterface
     */
    protected $shuffler;
    /**
     * @var array
     */
    protected $cards = [];
    /**
     * @var array
     */
    protected $dealt = [];

    /**
     * Deck constructor.
     * @param ShuffleStrategyInterface $strategy
     * @param array $cards
     */
    public function __construct(ShuffleStrategyInterface $strategy, array $cards)
    {
        $this->shuffler = $strategy;
        $this->cards = $cards;
    }

    /**
     * Use supplied shuffling algorithm and return deck
     *
     * @return Deck
     */
    public function shuffle(): DeckInterface
    {
        $this->shuffler->shuffle($this->cards);
        $this->shuffled = true;
        return $this;
    }

    /**
     * Display dealt and undealt cards via array
     *
     * @return array
     */
    public function display(): void
    {
        echo "Undealt: ";
        foreach ($this->cards as $card) {
            echo "{$card->display()} ";
        }

        echo "Dealt: ";
        foreach ($this->dealt as $card) {
            echo "{$card->display()} ";
        }
    }

    /**
     * Deal a card, if available from top of the deck, else return null
     *
     * @return CardInterface|null
     */
    public function dealOne(): ?CardInterface
    {
        try {
            if (!count($this->cards)) {
                throw new \RuntimeException('No cards available');
            }

            $card = array_pop($this->cards);
            $this->dealt[] = $card;
            $card->setDealt();
            return $card;

        } catch (\Exception $e) {
            return null;
        }
    }
}