<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Model;

interface ConditionInterface
{
    /**
     * Retourne la catégorie de ressource du ménage selon l'ANAH
     * @return string
     */
    public function getCategorieAnah(): string;

    /**
     * Retourne le type de logement
     * @return string
     */
    public function getTypeLogement(): string;

    /**
     * Retourne le statut des occupants du logement
     * @return string
     */
    public function getStatutOccupantLogement(): string;

    /**
     * Retourne l'âge du logement
     * @return int
     */
    public function getAgeLogement(): int;

    /**
     * Retourne le montant TTC des travaux déduit des aides financières
     * @return float
     */
    public function getCoutTTC(): float;

}
