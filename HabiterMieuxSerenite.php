<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite;

use AideTravaux\Anah\HabiterMieuxSerenite\Data\Entries;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\DataInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\ConditionInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\Repository\Repository;
use AideTravaux\Anah\HabiterMieuxSerenite\Utils\ConditionsResolver;

abstract class HabiterMieuxSerenite
{
    /**
     * @property string
     */
    const NOM = 'Habiter Mieux Sérénité';

    /**
     * @property string
     */
    const DESCRIPTION = 'Habiter Mieux Sérénité est une aide financière pour un projet de rénovation 
                        énergétique globale';
    
    /**
     * @property string
     */
    const DELAI = 'Versement sur présentation des factures';
    
    /**
     * @property string
     */
    const DISTRIBUTEUR = 'Agence nationale de l\'habitat';
    
    /**
     * @property array
     */
    const REFERENCES = [
        'https://www.anah.fr/proprietaires/proprietaires-occupants/etre-mieux-chauffe-avec-habiter-mieux-et-maprimerenov/',
        'https://www.anah.fr/proprietaires/proprietaires-occupants/les-conditions-generales-a-remplir/'
    ];

    /**
     * @property array
     */
    const CONDITIONS = [
        'Les ressources du demandeur sont inférieures aux seuils fixés',
        'Le logement est une maison individuelle ou un appartement',
        'Le demandeur est propriétaire occupant du logement',
        'Le logement concerné est achevé depuis plus de quinze ans',
        'Le montant des travaux est supérieur à 1 500 €',
        'Les travaux permettent un gain énergétique d\'au moins 25%',
        'Les travaux ne concernent pas la décoration du logement, et ne sont assimilables ni à une 
        construction neuve, ni à un agrandissement',
        'Le demandeur n\'a pas bénéficié d\'un Prêt à taux zéro pour l\'accession à la propriété 
        durant les cinq dernières années',
        'Les travaux n\'ont pas commencé',
        'Les travaux sont réalisés par des professionnels du bâtiment',
        'Réserver à l\'Anah l\'enregistrement des Certificats d\'Économie d\'Énergie (CEE) générés 
        par les travaux',
        'Le demandeur s\'engage à habiter le logement en tant que résidence principale pendant 
        au moins 6 ans après la fin des travaux'
    ];

    /**
     * Retourne le montant de l'aide Habiter Mieux Sérénité
     * @param DataInterface
     * @return float
     */
    public static function get(DataInterface $model): float
    {
        return (float) self::getMontantAide($model) + self::getMontantPrime($model);
    }

    /**
     * Retourne le montant de l'aide Habiter Mieux Sérénité
     * @param DataInterface
     * @return float
     */
    public static function getMontantAide(DataInterface $model): float
    {
        return (float) \min(
            $model->getCoutTTC() * self::getTauxAide($model),
            self::getPlafondAide($model)
        );
    }

    /**
     * Retourne le taux de l'aide Habiter Mieux Sérénité
     * @param DataInterface
     * @return float
     */
    public static function getTauxAide(DataInterface $model): float
    {
        switch ($model->getCategorieAnah()) {
            case Entries::CATEGORIES_ANAH['cateogrie_anah_1']:
                return (float) 0.35;
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                return (float) 0.5;
            default:
                return (float) 0;
        }
    }

    /**
     * Retourne le plafond de l'aide Habiter Mieux Sérénité
     * @param DataInterface
     * @return int
     */
    public static function getPlafondAide(DataInterface $model): int
    {
        switch ($model->getCategorieAnah()) {
            case Entries::CATEGORIES_ANAH['cateogrie_anah_1']:
                return 7000;
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                return 10000;
            default:
                return 0;
        }
    }

    /**
     * Retourne le montant de la prime Habiter Mieux
     * @param DataInterface
     * @return float
     */
    public static function getMontantPrime(DataInterface $model): float
    {
        return (float) \min(
            $model->getCoutTTC() * self::getTauxPrime($model),
            self::getPlafondPrime($model)
        );
    }

    /**
     * Retourne le taux de la prime
     * @param DataInterface
     * @return float
     */
    public static function getTauxPrime(DataInterface $model): float
    {
        switch ($model->getCategorieAnah()) {
            case Entries::CATEGORIES_ANAH['cateogrie_anah_1']:
                return (float) 0.1;
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                return (float) 0.1;
            default:
                return (float) 0;
        }
    }

    /**
     * Retourne le plafond de la prime Habiter Mieux
     * @param DataInterface
     * @return int
     */
    public static function getPlafondPrime(DataInterface $model): int
    {
        switch ($model->getCategorieAnah()) {
            case Entries::CATEGORIES_ANAH['cateogrie_anah_1']:
                return 1600;
            case Entries::CATEGORIES_ANAH['cateogrie_anah_2']:
                return 2000;
            default:
                return 0;
        }
    }

    /**
     * @see ConditionsResolver
     */
    public static function resolveConditions(ConditionInterface $model): array
    {
        return ConditionsResolver::resolveConditions($model);
    }

    /**
     * @see ConditionsResolver
     */
    public static function isEligible(ConditionInterface $model): bool
    {
        return ConditionsResolver::isEligible($model);
    }

    /**
     * @return array
     */
    public static function toArray(): array
    {
        return [
            'nom' => self::NOM,
            'description' => self::DESCRIPTION,
            'delai' => self::DELAI,
            'distributeur' => self::DISTRIBUTEUR,
            'references' => self::REFERENCES,
            'conditions' => self::CONDITIONS
        ];
    }

}
