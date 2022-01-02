<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AuteurFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $auteur = new Auteur();

            if (rand() % 2 == 0) {
                $auteur->setNomPrenom($faker->name('male'));
                $auteur->setSexe('M');
            } else {
                $auteur->setNomPrenom($faker->name('female'));
                $auteur->setSexe('F');
            }
            $auteur->setDateDeNaissance($faker->dateTimeBetween('-100 years', '-20 years'));
            $auteur->setNationalite($faker->countryCode());
            $manager->persist($auteur);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1'];
    }
}
