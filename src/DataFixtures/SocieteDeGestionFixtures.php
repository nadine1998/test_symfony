<?php

namespace App\DataFixtures;

use App\Entity\SocieteDeGestion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class SocieteDeGestionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $generator = Factory::create("fr_FR");
    
        for ($i = 0; $i <= 5; $i++) {
            $societe_de_gestion = new SocieteDeGestion();
            $societe_de_gestion->setNom($generator->company);
            $societe_de_gestion->setAdresse($generator->address);
            $societe_de_gestion->setDateCreation(new \DateTime($generator->date));
            $societe_de_gestion->setEffectifs(mt_rand(10, 100));
            $manager->persist($societe_de_gestion);
        }
        $manager->flush();
    }
}
