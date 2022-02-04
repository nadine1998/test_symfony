<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
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
        $categories = $manager->getRepository(Categorie::class)->findAll();
        for ($i = 0; $i < 30; $i++) {
            $scpi = new Scpi();
            $scpi->setNom($generator->company);
            $scpi->setPrixPart(mt_rand(10, 100));
            $scpi->setTdvm(mt_rand(10, 100));
            $scpi->setCapitalisation(mt_rand(10, 100));
            $scpi->setDateCreation(new \DateTime($generator->date));
            $scpi->setTauxOccupation(mt_rand(10, 100));
            $scpi->setValeurRetrait(mt_rand(10, 100));
            $scpi->setSocieteDeGestion($generator->randomElement($societes_de_gestion));
            $scpi->setCategorie($generator->randomElement($categories));
            $scpi->setAssuranceVie(rand(0,1));
            $manager->persist($scpi);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            SocieteDeGestionFixtures::class,
            CategorieFixtures::class,
        );
    }
}
