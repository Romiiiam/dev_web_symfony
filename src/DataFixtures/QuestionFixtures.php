<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use App\Entity\Users;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Questions;
use Faker;

class QuestionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $question_users = $manager->getRepository(Users::class)->findAll();

        $i = 0;
        for ($i = 0; $i <= 50; $i++) {

            $user = $question_users[rand(0,50)];
            $question = new Questions();

            $question->setContent($faker->text);
            $question->setTitle($faker->title);
            $question->setUserId($user);

            $manager->persist($question);

        }

        // $product = new Product();
        // $manager->persist($product);
        
        $manager->flush();
    }
    function getOrder()
    {
        return 2;
    }
}