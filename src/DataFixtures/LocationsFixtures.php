<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Locations;

class LocationsFixtures extends Fixture
{
   
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 1; $i <= 20; $i++) {
            $Location = new Locations();
            $Location->setTitre("Titre n°$i ")
                ->setCreatedAt(new \DateTime())
                ->setCategorie("Categorie n°$i ")
                ->setImage("http://placehold.it/300x200")
                ->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit")
                ->setSurface(mt_rand(25,300))
                ->setChambres(mt_rand(1,10))
                ->setTypeMaison("Type_maison $i")
                ->setEtage(mt_rand(1,3) )
                ->setCout(mt_rand(1000,1000000))
                ->setAdresse("adresse N° $i")
                ->setAccesibilite(mt_rand(0,1));
                

            $manager->persist($Location);
        }

        $manager->flush();
    }
}