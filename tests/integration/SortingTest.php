<?php

use PHPUnit\Framework\TestCase;

class SortingTest extends TestCase
{
    /**
     * @var \Media\Library\Contracts\DeckInterface
     */
    protected $deck;
    /**
     * @var \Media\Library\Contracts\HandInterface
     */
    protected $hand;
    /**
     * @var array
     */
    protected $stubs = [];
    /**
     * @var array
     */
    protected $cards = [];

    /**
     * Setup
     */
    public function setUp()
    {
        $factory = new \Media\Library\DeckFactory();
        $strategy = new \Media\library\ShuffleUsingRandStrategy();
        $this->deck = $factory->create($strategy);

        $this->hand = new \Media\Library\Hand(
            new \Media\Library\SortSuitUsingInsertionStrategy(),
            new \Media\Library\SortValueUsingInsertionStrategy()
        );

        $this->stubs = include realpath(__DIR__ . '/..') . "/stub/CardStub.php";

        foreach ($this->stubs as $stub) {
            $this->cards[] = new \Media\Library\Card(
                $stub['suit'],
                $stub['type'],
                $stub['value'],
                $stub['picture']
            );
        }
    }

    /**
     * Test shuffle and display
     */
    public function testSortingAndCheckingForStraight()
    {
        $this->assertInstanceOf(\Media\Library\Contracts\HandInterface::class, $this->hand->sortBySuit());
        $this->assertInstanceOf(\Media\Library\Contracts\HandInterface::class, $this->hand->sortByValue());

        foreach ($this->cards as $card) {
            $this->hand->addCard($card);
        }

        $this->assertTrue($this->hand->hasStraight(5, true));

    }
}