<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    /** @var string PWD = test (encoded password) */
    private const PWD = '$argon2id$v=19$m=65536,t=4,p=1$hx4D9VdVvH7t5J1skUMETQ$B8XT17eBayO7+r4pIaYGDCCq0YWXEZU1jX2HvM7PyMw';


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $object = (new User())
            ->setCreatedAt($faker->dateTimeBetween('-1 years', 'now'))
            ->setActive(true)
            ->setUsername('admin')
            ->setRoles(['ROLE_SUPER_ADMIN'])
            ->setPassword(self::PWD);
        $manager->persist($object);

        $manager->flush();
    }
}
