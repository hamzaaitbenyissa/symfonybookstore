<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Genre;
use App\Entity\Livre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LivreFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $auteurs = $manager->getRepository(Auteur::class)->findAll();
        $genres = $manager->getRepository(Genre::class)->findAll();

        for ($i = 0; $i < 50; $i++) {
            $livre = new Livre();

            $livre->setIsbn($faker->isbn13());
            $livre->setTitre($faker->sentence());
            $livre->setDateDeParution($faker->dateTimeBetween('-121 years', 'now'));
            $livre->setNombrePages($faker->numberBetween(20, 400));
            $livre->setNote($faker->numberBetween(0, 20));
            for ($j = 0; $j < rand(1, 3); $j++) {
                $livre->addAuteur($faker->randomElement($auteurs));
            }

            for ($k = 0; $k < rand(1, 3); $k++) {
                $livre->addGenre($faker->randomElement($genres));
            }


            $manager->persist($livre);
        }


        $manager->flush();
    }


    public static function getGroups(): array
    {
        return ['group2'];
    }
}
