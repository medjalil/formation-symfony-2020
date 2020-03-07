<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture {

    public function load(ObjectManager $manager) {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $category = new Category();
            $category->setName($faker->company);
            $manager->persist($category);
            $this->createPost($manager, $category, $faker);
        }

        $manager->flush();
    }

    private function createPost(ObjectManager $manager, Category $category, \Faker\Generator $faker) {
        for ($j = 0; $j < 5; $j++) {
            $post = new Post();
            $post->setTitle($faker->text($maxNbChars = 100));
            $post->setContent($faker->text($maxNbChars = 300));
            $post->setImage('http://lorempixel.com/800/600/cats/?' . $j);
            $post->setCreatedAt($faker->dateTime($max = 'now'));
            $post->setCategory($category);
            $manager->persist($post);
        }
    }

}
