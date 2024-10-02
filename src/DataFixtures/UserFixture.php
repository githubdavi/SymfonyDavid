<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Enum\UserAccountStatusEnum;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

define('MAX_USER',5);
define('MAX_MEDIA',5);

class UserFixture extends Fixture
{

    private $passwordEncoder;

    public function load(ObjectManager $manager): void
    {
            // USER
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < MAX_USER; $i++) {
            $user = new User();
            $user->setUsername($faker->userName);
            $user->setEmail($faker->email);
            $user->setPassword('password123');
            // $user->setAccountStatus();
            $manager->persist($user);
        }
        $manager->persist($user);

     
       // MEDIA

        for ($i = 0; $i < MAX_MEDIA; $i++) {
            $user = new Media();
            $user->setTitle($faker->sentence(3));
            $user->setShortDescription($faker->sentence(3));
            $user->setLongDescription($faker->sentence(10));
            $user->setCover($faker->sentence(4));
            $user->setCasting([$faker->sentence(4)],[$faker->sentence(4)]);
            $user->stStaff([$faker->sentence(4)],[$faker->sentence(4)]);

            $manager->persist($user);
        }
        $manager->persist($user);

        $manager->flush();
    }
}
