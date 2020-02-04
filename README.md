# Habiter Mieux Sérénité

## Introduction

La classe HabiterMieuxSerenite retourne toutes les informations relatives à l'aide financière Habiter Mieux Sérénité

## Constantes

**HabiterMieuxSerenite::NOM**
Le nom de l'aide financière

**HabiterMieuxSerenite::DESCRIPTION**
Une description de l'aide financière

**HabiterMieuxSerenite::DELAI**
Délai de versement de l'aide financière

**HabiterMieuxSerenite::DISTRIBUTEUR**
Distributeur de l'aide financière

**HabiterMieuxSerenite::REFERENCES**
Références légales ou institutionnelles de l'aide financière

**HabiterMieuxSerenite::CONDITIONS**
Conditions d'accès de l'aide financière

## Méthodes

```
HabiterMieuxSerenite::get(DataInterface $model): float;
```
Retourne le montant calculé de l'aide financière sur la base des informations transmises

```
HabiterMieuxSerenite::getMontantAide(DataInterface $model): float;
```
Retourne le montant de la composante "Aide" sur la base des informations transmises

```
HabiterMieuxSerenite::getTauxAide(DataInterface $model): float;
```
Retourne le taux de couverture de la composante "Aide" calculé sur la base des informations transmises

```
HabiterMieuxSerenite::getPlafondAide(DataInterface $model): int;
```
Retourne le plafond de la composante "Aide" calculé sur la base des informations transmises

```
HabiterMieuxSerenite::getMontantPrime(DataInterface $model): float;
```
Retourne le montant de la composante "Prime" sur la base des informations transmises

```
HabiterMieuxSerenite::getTauxPrime(DataInterface $model): float;
```
Retourne le taux de couverture de la composante "Prime" calculé sur la base des informations transmises

```
HabiterMieuxSerenite::getPlafondPrime(DataInterface $model): int;
```
Retourne le plafond de la composante "Prime" calculé sur la base des informations transmises

```
HabiterMieuxSerenite::resolveConditions(ConditionInterface $model): array;
```
Retourne les conditions d'accès à l'aide et, pour chacune, si la condition est satisfaite sur la base des 
informations transmises

```
HabiterMieuxSerenite::isEligible(ConditionInterface $model): bool;
```
Retourne l'éligibilité du projet à l'aide financière sur la base des informations transmises

## Exemples

```
<?php

use AideTravaux\Anah\HabiterMieuxSerenite\Model\DataInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\Model\ConditionInterface;
use AideTravaux\Anah\HabiterMieuxSerenite\HabiterMieuxSerenite;

class Data implements DataInterface, ConditionInterface
{
    public function getCategorieAnah(): string
    {
        return 'Modeste';
    }

    public function getCoutTTC(): float
    {
        return (float) 12000;
    }

    public function getTypeLogement(): string
    {
        return 'Maison individuelle';
    }

    public function getStatutOccupantLogement(): string
    {
        return 'Propriétaire occupant';
    }

    public function getAgeLogement(): int
    {
        return 30;
    }
}

$data = new Data();

HabiterMieuxSerenite::get($data);
HabiterMieuxSerenite::resolveConditions($data);

```

## Sources

- [Site de l'agence nationale de l'habitat](https://www.anah.fr/proprietaires/proprietaires-occupants/etre-mieux-chauffe-avec-habiter-mieux-et-HabiterMieuxSerenite/)

- [Plaquette de présentation de l'aide](https://www.anah.fr/fileadmin/anah/Mediatheque/Publications/Les_aides/depliant_HM_serenite.pdf)
