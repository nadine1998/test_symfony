<?php
namespace App\Data;

class SearchData
{
    /**
     * @var int
     */
    public $page = 1;
    /**
     * @var societe_de_gestion[]
     */
    public $societe_de_gestion;

    /**
     * @var categorie[]
     */

    public $categorie;

    /**
     * @var string
     */

    public $localisation;

    /**
     * @var boolean
     */

    public $assurance_vie = false;
}
