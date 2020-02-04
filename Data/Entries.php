<?php

namespace AideTravaux\Anah\HabiterMieuxSerenite\Data;

use AideTravaux\Core\Entries as BaseEntries;
use AideTravaux\Anah\Categorie\Entries as AnahCategorieEntries;

abstract class Entries extends BaseEntries
{
    /**
     * @property array
     */
    const CATEGORIES_ANAH = AnahCategorieEntries::CATEGORIES_ANAH;

}
