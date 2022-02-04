<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $categorie = new Categorie();
        $categorie->setNom('Bureau');
        $manager->persist($categorie);
        $categorie = new Categorie();
        $categorie->setNom('Commerce');
        $manager->persist($categorie);
        $categorie = new Categorie();
        $categorie->setNom('Diversifiée');
        $manager->persist($categorie);
        $categorie = new Categorie();
        $categorie->setNom('Logistique');
        $manager->persist($categorie);

        $manager->flush();
    }
}
