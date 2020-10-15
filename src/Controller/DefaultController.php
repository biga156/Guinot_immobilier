<?php

namespace App\Controller;
use App\Entity\ImmoVente;
use App\Entity\Ventes;
use App\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    
    /** 
     * @Route("/accueil", name="accueil")
    */
    public function accueil()
    {
        return $this->render('default/accueil.html.twig');
    }
    
     /** 
     * @Route("/enregistrements", name="enregistrements")
    */
    public function enregistrements()
    {
        return $this->render('default/enregistrements.html.twig');
    }

     /** 
     * @Route("/user", name="user")
    */
    public function user()
    {
        return $this->render('default/user.html.twig');
    }
    
     /** 
     * @Route("/autre", name="autre")
    */
    public function autre()
    {
        return $this->render('default/autre.html.twig');
    }

/**
     * 
     * @Route("/index", name="index")
     * 
     */
    public function index()
    {
        // Connexion à Doctrine,
        // Connexion au Repository,
        $repo = $this->getDoctrine()->getRepository(ImmoVente::class);
        $immobiliers = $repo->findAll();

        return $this->render('default/index.html.twig', [
           'controller_name' => 'DefauultController',
            // passage du contenu de $immobilier
            'immobiliers'=>$immobiliers
        ]);
    }

     /** 
     * @Route("/test", name="test")
    */
    public function test()
    {
        return $this->render('default/test.html.twig');
    }

     /** 
     * @Route("/administration", name="administration")
    */
    public function administration()
    {
        return $this->render('default/administration.html.twig');
    }

       /** 
     * @Route("/connexion", name="connexion")
    */
    public function connexion()
    {
        return $this->render('default/connexion.html.twig');
    }

     /** 
     * @Route("/nouscontacter", name="nouscontacter")
    */
    public function nouscontacter()
    {
        return $this->render('default/nouscontacter.html.twig');
    }

     /**
     * 
     * @Route("/les_ventes", name="les_ventes")
     * 
     */
    public function les_ventes()
    {
        // Connexion à Doctrine,
        // Connexion au Repository,
        $repo = $this->getDoctrine()->getRepository(Ventes::class);
        $Vente = $repo->findAll();

        return $this->render('default/les_ventes.html.twig', [
           'controller_name' => 'DefauultController',
            // passage du contenu de $immobilier
            'GuinotVente'=>$Vente
        ]);
    }

  /**
     * 
     * @Route("/les_locations", name="les_locations")
     * 
     */
    public function les_locations()
    {
        // Connexion à Doctrine,
        // Connexion au Repository,
        $repo = $this->getDoctrine()->getRepository(Locations::class);
        $Location = $repo->findAll();

        return $this->render('default/les_locations.html.twig', [
           'controller_name' => 'DefauultController',
            // passage du contenu de $immobilier
            'GuinotLocation'=>$Location
        ]);
    }

    /**
     * @Route("/affichage", name="affichage")
     * 
     */
	 
	public function affichage()
    {
      return $this->render('default/affichage.html.twig');
  }
    
    
}