<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Playlist;


class PlaylistFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 3; $i++) {
            $playlist = new Playlist();
            $playlist->setTitre($faker->word());
            $playlist->setDescription($faker->sentence(1));


            $this->addReference('playlist' . $i, $playlist);
            $manager->persist($playlist);
        }

        $manager->flush();
    }
}
