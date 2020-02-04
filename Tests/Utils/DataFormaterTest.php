<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\DataInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\ConditionInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\Utils\DataFormater;

class DataFormaterTest extends TestCase
{
    public function testGet()
    {
        $this->assertTrue(\is_array(DataFormater::get()));
    }
}
