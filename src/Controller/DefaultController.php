<?php

namespace App\Controller;

use App\Entity\ImmoVente;
use App\Entity\Ventes;
use App\Entity\Locations;
use App\Form\LocationsType;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    protected $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
/****************************Forms************************** */
    /** 
     * @param Request $request
     * @Route("/immo/vente", name="immo.vente")
     * @param Response
    */   
    public function venteForm(Request $request){
        
        $entityManager = $this->entityManager;
        $vente = new Ventes();

        //make:form version->
        //$form = $this->createForm(VentesType::class, $vente); 

        // Demande de al creation du Formaulaire avec CreateFormBuilder
        
        $form = $this->createFormBuilder($vente)
                    ->add('createdAt')
                    ->add('titre')
                    ->add('categorie')
                    ->add('image')
                    ->add('description')
                    ->add('surface')
                    ->add('type_maison')
                    ->add('chambres')
                    ->add('etage')
                    ->add('cout')
                    ->add('adresse')
                    ->add('accesibility')
        //Utiser la Function GetForm pour voir le resultat Final
                    ->getForm();
                
        
        // Traitement de la requete (http) passée en parametre
        $form->handleRequest($request);

        // Test sur le Remplissage / la soummision et la validité des champs
        if ($form->isSubmitted() && $form->isValid()) {
            
            // Affectation de la Date à mon article
            $vente->setCreatedAt(new \DateTime());

            $entityManager->persist($vente);
            $entityManager->flush();

            //Enregistrement et Retour sur la page de l'article
            return $this->redirectToRoute('test', ['id'=>$vente->getId()]);
        }
         
            
        //aPassage à Twig des Variable à afficher avec lmethode CreateView
        return $this->render('default/formVente.html.twig', [
            'formVente' => $form->createView()
        ]);
    }

    
     /** 
     * @Route("/immo/location", name="immo.location")
    */   
    public function locationForm(Request $request){
        
        $entityManager = $this->entityManager;
        $location = new Locations();

        //$form = $this->createForm(LocationsType::class, $location); 
        $form = $this->createFormBuilder($location)
                ->add('createdAt')
                ->add('titre')
                ->add('categorie')
                ->add('image')
                ->add('description')
                ->add('surface')
                ->add('type_maison')
                ->add('chambres')
                ->add('etage')
                ->add('cout')
                ->add('adresse')
                ->add('accesibilite')
        //Utiser la Function GetForm pour voir le resultat Final
                    ->getForm();
                
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
             $location->setCreatedAt(new \DateTime());

            $entityManager->persist($location);
            $entityManager->flush();
            
            return $this->redirectToRoute('immo.location', ['id'=>$location->getId()]);
        }
         
        return $this->render('default/formLocation.html.twig', [
            'formLocation' => $form->createView()
        ]);
    }
    
/********************************End of forms*************************** */
                    /**************Intermezzo************* */
/********************************Actions************************ */
   /**
     * @Route("immo/{id}/delete", name="immo_delete", methods={"DELETE"})
     */
    
    public function delete(Request $request, ImmoVente $immobilier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$immobilier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($immobilier);
            $entityManager->flush();
        }
        return $this->redirectToRoute('index.accueil');
    }
/******************************End of actions******************* */
                /**************Intermezzo************* */
/****************************Menus*************************** */
/** 
     * @Route("/user", name="user")
    */
    public function user()
    {
        return $this->render('default/user.html.twig');
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
            'immobiliers' => $immobiliers
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
            // passage du contenu de $vente
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
            // passage du contenu de $vente
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
  
  /**
     * @Route("/immo/{id}", name="index.affichVente")
     */
    // recuperation de l'identifiant
    public function affichVente($id)
    {
        // Appel à Doctrine & au repository
        $repo = $this->getDoctrine()->getRepository(Ventes::class);

        //Recherche de l'article avec son identifaint
        $immobilier = $repo->find($id);
        // Passage à Twig de tableau avec des variables à utiliser
        return $this->render('default/affich.html.twig', [
            'controller_name' => 'DefaultController',
            'immoVente' => $immobilier
        ]);
    }
    
    /**
     * @Route("/immo/{id}", name="index.affichLoc")
     */
    // recuperation de l'identifiant
    public function affichLoc($id)
    {
        // Appel à Doctrine & au repository
        $repo = $this->getDoctrine()->getRepository(Locations::class);

        //Recherche de l'article avec son identifaint
        $immobilier = $repo->find($id);
        // Passage à Twig de tableau avec des variables à utiliser
        return $this->render('default/affich.html.twig', [
            'controller_name' => 'DefaultController',
            'immoVente' => $immobilier
        ]);
    }
    
/***************************End of Menus********************* */
            /**************Intermezzo************* */
/********************** archived *******************************/
   /* 
     * @Route("/accueil", name="accueil")
   *
  
    public function accueil()
    {
        return $this->render('default/accueil.html.twig');
    }

     
    /* 
     * @Route("/immo/nouveau", name="immo.nouveau")
    
    public function nouveau(Request $request)
    {
        $entityManager = $this->entityManager;
        $vente = new ImmoVente();

        // Demande de al creation du Formaulaire avec CreateFormBuilder
        $form = $this->createFormBuilder($vente)
                    ->add('titre')
                    ->add('photo')                
                    ->add('description')    
        //Utiser la Function GetForm pour voir le resultat Final
                    ->getForm();
        
        // Traitement de la requete (http) passée en parametre
        $form->handleRequest($request);

        // Test sur le Remplissage / la soummision et la validité des champs
        if ($form->isSubmitted() && $form->isValid()) {
            
            // Affectation de la Date à mon article
            $vente->setCreatedAt(new \DateTime());

            $entityManager->persist($vente);
            $entityManager->flush();

            //Enregistrement et Retour sur la page de l'article
            return $this->redirectToRoute('immo.nouveau', ['id'=>$vente->getId()]);
        }
         
            
        //aPassage à Twig des Variable à afficher avec lmethode CreateView
        return $this->render('default/nouveau.html.twig', [
            'formImmoVente' => $form->createView()
        ]);
    }

    
    /** 
     * @Route("/enregistrements", name="enregistrements")
    
    public function enregistrements()
    {
        return $this->render('default/enregistrements.html.twig');
    }
    
    */
    /*******************End of archived********************** */
  
}