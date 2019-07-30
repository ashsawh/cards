<?php
/**
 * Created by PhpStorm.
 * User: FURY
 * Date: 6/13/2019
 * Time: 8:29 PM
 */

namespace Media\library\contracts;

/**
 * Interface SortingStrategyInterface
 * @package Media\library\contracts
 */
interface SortingStrategyInterface
{
    /**
     * @param array $cards
     * @return mixed
     */
    public function sort(array &$cards): void;
}