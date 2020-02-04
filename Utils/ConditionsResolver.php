<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Utils;

use AideTravaux\Anah\HabiterMieuxSerenite\HabiterMieuxSerenite;
use AideTravaux\Anah\HabiterMieuxSerenite\Data\Entries;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\ConditionInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\Repository\Repository;

abstract class ConditionsResolver
{
    /**
     * Retourne les conditions d'accès satisfaites ou non
     * @param ConditionInterface
     * @return array
     */
    public static function resolveConditions(ConditionInterface $model): array
    {
        $conditions = HabiterMieuxSerenite::CONDITIONS;

        return [
            [
                'condition' => $conditions[0],
                'value' => \in_array( $model->getCategorieAnah(), Entries::CATEGORIES_ANAH )
            ], [
                'condition' => $conditions[1],
                'value' => \in_array($model->getTypeLogement(), [
                    Entries::TYPES_LOGEMENT['type_logement_1'],
                    Entries::TYPES_LOGEMENT['type_logement_2']
                ])
            ], [
                'condition' => $conditions[2],
                'value' => $model->getStatutOccupantLogement() 
                            === Entries::STATUTS_OCCUPANT_LOGEMENT['statut_occupant_logement_1']
            ], [
                'condition' => $conditions[3],
                'value' => $model->getAgeLogement() > 15
            ], [
                'condition' => $conditions[4],
                'value' => $model->getCoutTTC() >= 1500
            ], [
                'condition' => $conditions[5],
                'value' => null
            ], [
                'condition' => $conditions[6],
                'value' => null
            ], [
                'condition' => $conditions[7],
                'value' => null
            ], [
                'condition' => $conditions[8],
                'value' => null
            ], [
                'condition' => $conditions[9],
                'value' => null
            ], [
                'condition' => $conditions[10],
                'value' => null
            ], [
                'condition' => $conditions[11],
                'value' => null
            ]
        ];
    }

    /**
     * Retourne l'éligibilité à l'aide financière
     * @param ConditionInterface
     * @return bool
     */
    public static function isEligible(ConditionInterface $model): bool
    {
        foreach (self::resolveConditions($model) as $condition) {
            if ($condition['value'] === false)  {
                return false;
            }
        }
        return true;
    }
}
