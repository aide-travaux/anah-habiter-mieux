<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Tests\Data;

use PHPUnit\Framework\TestCase;
use AideTravaux\Anah\HabiterMieuxSerenite\Data\Entries;

class EntriesTest extends TestCase
{
    public function testConstants()
    {
        $reflectionClass = new \ReflectionClass(Entries::class);
        $this->assertNotFalse($reflectionClass->getConstant('CATEGORIES_ANAH'));
    }

    /**
     * @depends testConstants
     */
    public function testConstantsType()
    {
        $this->assertTrue(\is_array(Entries::CODES_REGION));
    }

}
