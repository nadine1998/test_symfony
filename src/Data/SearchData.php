<?php
namespace App\Data;

class SearchData{

    /**
     * @var string
     */
    public $query;

    /**
     * @var societes_de_gestion[]
     */
    public $societes_de_gestion;

     /**
     * @var string
     */
    public $localisation;

     /**
     * @var boolean
     */
    public $assurance_vie = false;
}