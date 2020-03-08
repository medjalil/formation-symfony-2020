<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture {

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager) {
        $faker = Factory::create('fr_FR');
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setFullName($faker->name);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));
        $user->setRoles(array('ROLE_USER'));
        $manager->persist($user);
        for ($i = 0; $i < 20; $i++) {
            $category = new Category();
            $category->setName($faker->company);
            $manager->persist($category);
            $this->createPost($manager, $category, $faker);
        }

        $manager->flush();
    }

    private function createPost(ObjectManager $manager, Category $category, Generator $faker) {
        for ($j = 0, $y = 1; $j < 5; $j++) {
            $post = new Post();
            $post->setTitle($faker->text($maxNbChars = 100));
            $post->setContent($faker->text($maxNbChars = 300));
            $post->setImage('https://loremflickr.com/286/180?lock=' . $y++);
            $post->setCreatedAt($faker->dateTime($max = 'now'));
            $post->setCategory($category);
            $manager->persist($post);
        }
    }

}
