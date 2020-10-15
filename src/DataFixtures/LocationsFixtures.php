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
                ->setDescription("Description N° $i")
                ->setSurface("$i")
                ->setChambres("$i")
                ->setTypeMaison("Type_maison $i")
                ->setEtage(mt_rand(1,3) )
                ->setCout("$i")
                ->setAdresse("adresse N° $i")
                ->setAccesibilite("$i");
                

            $manager->persist($Location);
        }

        $manager->flush();
    }
}