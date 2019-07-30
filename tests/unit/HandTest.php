<?php

use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    /**
     * @var array
     */
    protected $stubs = [];
    /**
     * @var array
     */
    protected $cards = [];
    /**
     * @var \Media\Library\Contracts\HandInterface
     */
    protected $hand;

    /**
     * Setup tests
     */
    public function setUp()
    {
        $this->stubs = include realpath(__DIR__ . '/..') . "/stub/CardStub.php";

        foreach ($this->stubs as $stub) {
            $this->cards[] = new \Media\Library\Card(
                $stub['suit'],
                $stub['type'],
                $stub['value'],
                $stub['picture']
            );
        }

        $this->hand = new \Media\Library\Hand(
            $this->createMock(\Media\Library\SortSuitUsingInsertionStrategy::class),
            $this->createMock(\Media\Library\SortValueUsingInsertionStrategy::class)
        );
    }

    /**
     * Test display
     */
    public function testDisplay()
    {
        $this->assertEmpty($this->hand->display());
    }

    /**
     * Test adding a card
     */
    public function testAddCard()
    {
        $this->assertInstanceOf(\Media\Library\Contracts\HandInterface::class, $this->hand->addCard($this->cards[0]));

        for ($i = 1; $i < 5; $i++) {
            $this->hand->addCard($this->cards[$i]);
        }

        $this->assertInstanceOf(\Media\Library\Contracts\HandInterface::class, $this->hand->sortBySuit());
        $this->assertInstanceOf(\Media\Library\Contracts\HandInterface::class, $this->hand->sortByValue());
    }

    /**
     * Test sorts
     */
    public function testSorts()
    {
        $this->assertInstanceOf(\Media\Library\Contracts\HandInterface::class, $this->hand->sortBySuit());
        $this->assertInstanceOf(\Media\Library\Contracts\HandInterface::class, $this->hand->sortByValue());
    }

    /**
     * Test having a straight
     */
    public function testHasStraight()
    {
        $this->assertFalse($this->hand->hasStraight(5, true));
    }
}