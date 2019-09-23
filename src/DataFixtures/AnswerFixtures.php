<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use App\Entity\Users;
use Faker;


class AnswerFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i <= 50; $i++) {
            $answser_user = new Users();
            $answser_user->setName($faker->word);
            $manager->persist($answser_user);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    function getOrder()
    {
        return 1;
    }

}