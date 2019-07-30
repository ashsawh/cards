<?php

require_once 'vendor/autoload.php';
$log = new Monolog\Logger("app.log");

try {
    /**
     * Create factory to create deck and supply with shuffling strategy. Instantiate a hand to add cards to.
     */
    $factory = new \Media\Library\DeckFactory();
    $deck = $factory->create(new \Media\library\ShuffleUsingRandStrategy());

    $hand = new \Media\Library\Hand(
        new \Media\Library\SortSuitUsingInsertionStrategy(),
        new \Media\Library\SortValueUsingInsertionStrategy()
    );

    $deck->shuffle();

    /**
     * Add to hand then perform sorts and checking for cards
     */
    $hand->addCard($deck->dealOne());
    $hand->addCard($deck->dealOne());
    $hand->addCard($deck->dealOne());
    $hand->addCard($deck->dealOne());
    $hand->addCard($deck->dealOne());

    $deck->display();

    $hand->display();
    $hand->sortBySuit();
    echo "\r\n";
    $hand->display();

    echo $hand->display();
    $hand->sortByValue();
    echo "\r\n";
    echo $hand->display();

    echo "\r\n";
    echo $hand->hasStraight(2, false) ? 'Is a straight' : 'Not a straight';
    echo "\r\n";
    echo $hand->hasStraight(2, true) ? 'Is a straight flush' : 'Not a straight flush';

} catch (Exception $e) {
    $log->addError("Something went wrong!" . time());
}