<?php

namespace App\DataFixtures;

use App\Entity\Scpi;
use App\Entity\SocieteDeGestion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
class ScpiFixtures extends Fixture implements DependentFixtureInterface

{
    public function load(ObjectManager $manager): void
    {
        $generator = Factory::create("fr_FR");
        $societes_de_gestion = $manager->getRepository(SocieteDeGestion::class)->findAll();
        for ($i = 0; $i < 20; $i++) {
            $scpi = new Scpi();
            $scpi->setNom($generator->company);
            $scpi->setPrixPart(mt_rand(10, 100));
            $scpi->setTdvm(mt_rand(10, 100));
            $scpi->setCapitalisation(mt_rand(10, 100));
            $scpi->setAnneeCreation(mt_rand(10, 100));
            $scpi->setTauxOccupation(mt_rand(10, 100));
            $scpi->setValeurRetrait(mt_rand(10, 100));
            $scpi->setAnneeCreation(mt_rand(1980, 2020));
            $scpi->setSocieteDeGestion($generator->randomElement($societes_de_gestion));
            $manager->persist($scpi);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            SocieteDeGestionFixtures::class,
        );
    }
}
