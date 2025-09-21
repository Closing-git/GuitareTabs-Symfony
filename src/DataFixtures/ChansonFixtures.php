<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Chanson;
use App\Entity\Artiste;
use App\Entity\Playlist;
use App\DataFixtures\ArtisteFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChansonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $faker = Faker\Factory::create('fr_FR');
            $chanson = new Chanson();
            $chanson->setTitre($faker->word());
            $chanson->setUrl($faker->url());
            $chanson->setDifficulte($faker->numberBetween(1, 3));
            $chanson->setTonalite($faker->lexify("?"));
            $chanson->setCapodastre($faker->numberBetween(0, 8));
            $chanson->setVitesseDeplacement($faker->randomFloat(1, 0, 5));
            $chanson->setNbClics($faker->numberBetween(0, 500));
            $chanson->setAutre($faker->sentence(1));


            $chanson->setChanteur($this->getReference('chanteur' . $faker->numberBetween(1, 10), Artiste::class));

            $chanson->addPlaylist($this->getReference('playlist' . $faker->numberBetween(1, 3), Playlist::class));
            $chanson->addPlaylist($this->getReference('playlist' . $faker->numberBetween(1, 3), Playlist::class));


            $manager->persist($chanson);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return ([
            ArtisteFixtures::class,
            PlaylistFixtures::class,
        ]);
    }
}
