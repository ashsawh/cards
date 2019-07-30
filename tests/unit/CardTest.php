<?php

use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    /**
     * @var \Media\Library\Card
     */
    protected $card;
    /**
     * @var array
     */
    protected $stubs = [];

    public function setUp()
    {
        $this->stubs = require_once realpath(__DIR__ . '/..') . "/stub/CardStub.php";
        $this->card = new \Media\Library\Card('Diamonds', '10', 10, false);
    }

    /**
     * Test display
     */
    public function testDisplay()
    {
        $this->assertSame("10 of Diamonds", $this->card->display());
    }

    /**
     * Test dealing cards
     */
    public function testDealt()
    {
        $this->assertInstanceOf(\Media\Library\Contracts\CardInterface::class, $this->card->setDealt());
        $this->assertSame($this->card->isDealt(), true);
    }

    /**
     * Test picture
     */
    public function testIsPicture()
    {
        $this->assertSame($this->card->isPicture(), false);
    }

    /**
     * Test value and suit
     */
    public function testGetValue()
    {
        $this->assertSame($this->card->getValue(), 10);
    }

    /**
     * Test get suit
     */
    public function testGetSuit()
    {
        $this->assertSame($this->card->getSuit(), 'Diamonds');
    }
}