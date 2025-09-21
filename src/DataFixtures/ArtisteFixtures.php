<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artiste;
use Faker;
class ArtisteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 10; $i++) {
            $artiste = new Artiste();
            $artiste->setPrenomPseudo($faker->firstName);
            $artiste->setNom($faker->lastName);

            $this->addReference('chanteur' . $i, $artiste);
            $manager->persist($artiste);
        }

        $manager->flush();
    }
}
