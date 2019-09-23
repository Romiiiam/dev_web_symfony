<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use App\Entity\Users;
use App\Entity\Questions;
use App\Entity\Answers;

use Faker;
use Symfony\Component\Console\Question\Question;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i <= 50; $i++) {
        
            $each_question = $manager->getRepository(Questions::class)->findAll()[rand(0,50)];
            $answers = new Answers();

            $answers->setContent($faker->text);
            $answers->setQuestionId($each_question);
            $answers->setStatus($faker->boolean);

            $manager->persist($answers);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    function getOrder()
    {
        return 3;
    }
}