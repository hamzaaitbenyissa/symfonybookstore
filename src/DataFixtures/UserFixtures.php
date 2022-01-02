<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create();
        $user = new User();
        $user->setEmail($faker->email());
        $user->setPassword($faker->password());
        $user->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user);
        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['group3'];
    }
}
