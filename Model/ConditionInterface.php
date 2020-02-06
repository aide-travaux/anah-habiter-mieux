<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Model;

interface ConditionInterface
{
    public function getCategorieAnah(): string;

    public function getTypeLogement(): string;

    public function getStatutOccupantLogement(): string;

    public function getAgeLogement(): int;

    public function getCoutTTC(): float;

}
