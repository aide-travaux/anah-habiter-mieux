<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Model;

interface DataInterface
{
    /**
     * Retourne la catégorie de ressource du ménage selon l'ANAH
     * @return string
     */
    public function getCategorieAnah(): string;

    /**
     * Retourne le montant TTC des travaux déduit des aides financières
     * @return float
     */
    public function getCoutTTC(): float;

}
