<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Tests\Utils;

use PHPUnit\Framework\TestCase;
use AideTravaux\Anah\HabiterMieuxSerenite\HabiterMieuxSerenite;
use AideTravaux\Anah\HabiterMieuxSerenite\Data\Entries;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\ConditionInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\Utils\ConditionsResolver;

class ConditionsResolverTest extends TestCase
{
    /**
     * @dataProvider modelProvider
     */
    public function testResolveConditions($model)
    {
        $this->assertTrue(\is_array(ConditionsResolver::resolveConditions($model)));
        $this->assertEquals(
            \count(ConditionsResolver::resolveConditions($model)),
            \count(HabiterMieuxSerenite::CONDITIONS)
        );
    }

    /**
     * @depends testResolveConditions
     * @dataProvider modelProvider
     */
    public function testResolveConditionsStructure($model)
    {
        foreach (ConditionsResolver::resolveConditions($model) as $condition) {
            $this->assertArrayHasKey('condition', $condition);
            $this->assertArrayHasKey('value', $condition);
        }
    }

    /**
     * @depends testResolveConditionsStructure
     * @dataProvider modelProvider
     */
    public function testResolveConditionsType($model)
    {
        foreach (ConditionsResolver::resolveConditions($model) as $condition) {
            $this->assertTrue(\is_string($condition['condition']));
            $this->assertTrue(\is_null($condition['value']) || \is_bool($condition['value']));
        }
    }

    /**
     * @depends testResolveConditionsStructure
     * @dataProvider modelProvider
     */
    public function testIsEligible($model)
    {
        $this->assertTrue(\is_bool(ConditionsResolver::isEligible($model)));
    }

    public function modelProvider()
    {
        $stub = $this->createMock(ConditionInterface::class);

        $stub->method('getCategorieAnah')->willReturn('');
        $stub->method('getTypeLogement')->willReturn('');
        $stub->method('getStatutOccupantLogement')->willReturn('');
        $stub->method('getAgeLogement')->willReturn(0);
        $stub->method('getCoutTTC')->willReturn((float) 0);

        return [ [ $stub ] ];
    }
}
