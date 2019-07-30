<?php

use PHPUnit\Framework\TestCase;

class DeckFactoryTest extends TestCase
{
    /**
     * @var \Media\Library\DeckFactory
     */
    protected $factory;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->factory = new \Media\Library\DeckFactory();
    }

    /**
     * Test creating a deck
     */
    public function testCreate()
    {
        $mock = $this->createMock(\Media\library\ShuffleUsingRandStrategy::class);
        $this->assertInstanceOf(\Media\Library\Contracts\DeckInterface::class, $this->factory->create($mock));
    }
}