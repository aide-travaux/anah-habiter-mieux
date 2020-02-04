<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Utils;

use AideTravaux\Anah\HabiterMieuxSerenite\HabiterMieuxSerenite;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\DataInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\ConditionInterface;

abstract class DataFormater
{
    /**
     * @param mixed|null
     * @return array
     */
    public static function get($model = null): array
    {
        $array = HabiterMieuxSerenite::toArray();

        if ($model instanceof DataInterface) {
            $array = \array_merge($array, [
                'montant' => HabiterMieuxSerenite::get($model),
                'montant_aide' => HabiterMieuxSerenite::getMontantAide($model),
                'montant_prime' => HabiterMieuxSerenite::getMontantPrime($model),
                'taux_aide' => HabiterMieuxSerenite::getTauxAide($model),
                'taux_prime' => HabiterMieuxSerenite::getTauxPrime($model),
                'plafond_aide' => HabiterMieuxSerenite::getPlafondAide($model),
                'plafond_prime' => HabiterMieuxSerenite::getPlafondPrime($model)
            ]);
        }

        if ($model instanceof ConditionInterface) {
            $array = \array_merge($array, [
                'conditions' => HabiterMieuxSerenite::resolveConditions($model),
                'isEligible' => HabiterMieuxSerenite::isEligible($model)
            ]);
        }

        return $array;
    }
}
