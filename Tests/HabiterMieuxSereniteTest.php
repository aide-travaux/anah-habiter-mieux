<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\Anah\HabiterMieuxSerenite\HabiterMieuxSerenite;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\DataInterface;

class HabiterMieuxSereniteTest extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function testGet($model)
    {
        $value = HabiterMieuxSerenite::get($model);
        $this->assertTrue(\is_float($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetMontantAide($model)
    {
        $value = HabiterMieuxSerenite::getMontantAide($model);
        $this->assertTrue(\is_float($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetTauxAide($model)
    {
        $value = HabiterMieuxSerenite::getTauxAide($model);
        $this->assertTrue(\is_float($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetPlafondAide($model)
    {
        $value = HabiterMieuxSerenite::getPlafondAide($model);
        $this->assertTrue(\is_int($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetMontantPrime($model)
    {
        $value = HabiterMieuxSerenite::getMontantPrime($model);
        $this->assertTrue(\is_float($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetTauxPrime($model)
    {
        $value = HabiterMieuxSerenite::getTauxPrime($model);
        $this->assertTrue(\is_float($value));
    }

    /**
     * @dataProvider modelProvider
     */
    public function testGetPlafondPrime($model)
    {
        $value = HabiterMieuxSerenite::getPlafondPrime($model);
        $this->assertTrue(\is_int($value));
    }

    public function testToArray()
    {
        $this->assertTrue(\is_array(HabiterMieuxSerenite::toArray()));
    }

    public function modelProvider()
    {
        $stub = $this->createMock(DataInterface::class);

        $stub->method('getCategorieAnah')->willReturn('');
        $stub->method('getCoutTTC')->willReturn((float) 1);        

        return [ [ $stub ] ];
    }
}
