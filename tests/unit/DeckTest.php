<?php

use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    /**
     * @var \Media\Library\Contracts\DeckInterface
     */
    protected $deck;

    /**
     * Setup
     */
    public function setUp()
    {
        $factory = new \Media\Library\DeckFactory();
        $this->deck = $factory->create($this->createMock(\Media\library\ShuffleUsingRandStrategy::class));
    }

    /**
     * Test shuffle and display
     */
    public function testShuffleAndDisplay()
    {
        $display = $this->deck->display();
        $this->assertInstanceOf(\Media\Library\Deck::class, $this->deck->shuffle());
        $this->assertEmpty($display);
    }

    /**
     * Test dealing a card
     */
    public function testDealOne()
    {
        $this->assertInstanceOf(\Media\Library\Card::class, $this->deck->dealOne());
    }
}