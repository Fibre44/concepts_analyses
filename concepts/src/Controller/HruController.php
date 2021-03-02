<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Rubriquehru;
use App\Entity\Client;
use App\Entity\Surcharge;
use App\Repository\RubriquehruRepository; 
use App\Repository\ClientRepository;
use App\Repository\SurchargeRepository;
use App\Form\ClientType; 
use App\Form\SurchargeType; 

class HruController extends AbstractController
{
  
   /**
    * @Route("/hru", name="hru_index")      
   */
    public function index(){

      return $this->render('hru/index.html.twig');

    }

    /**
     * @Route("/hru/{lien}", name="hru")
    */
    public function importcsv(Request $request, $lien,RubriquehruRepository $reporubriquehru): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $fichier = $lien;
        $chemin='./../public/uploads/rubriques/';
        $rubriquehrus = new Rubriquehru();

        $row =1;
        if (($handle = fopen($chemin.$fichier, "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);//nbre de colonne
            $row++;//nbre de ligne
            $libelles[]=substr($data[1],8,99);
            $codesrubriques[]=substr($data[1],0,5);
            $ccns[]=substr($data[0],5,4);
            $rubriquehrus->setCcn(substr($data[0],5,4));
            $rubriquehrus->setLibelle(substr($data[1],8,35));
            //$rubriquehrus->setLibelle('test');
            $rubriquehrus->setCode(substr($data[1],0,5));
            $rubriquehrus->setAuteur(substr($data[0],15,4));          
            $entityManager->persist($rubriquehrus);
            $rechercherubrique = $reporubriquehru->findOneBy(['code'=>$rubriquehrus->getCode()]);
            if (empty($rechercherubrique))  {//si la CCN n'existe pas dans la bibliotheque alors on peut ajouter 
              $entityManager->flush();
            }
            $rubriquehrus = new Rubriquehru();

            }
          fclose($handle);
      }
        return $this->render('hru/importcsv.html.twig', [
            'controller_name' => 'HruController',
            'fichier'=>$fichier,
            'num'=>$num,
            'row'=>$row,
            'libelles'=>$libelles,
            'codesrubriques'=>$codesrubriques,
            'ccns'=>$ccns,
            'rubriquehrus'=>$rubriquehrus,
            
        ]);
    }

    /**
     * @Route("/hru/rubriques/show", name="hru_rubriqueshow")
    */
    public function hrurubriqueshow(RubriquehruRepository $reporubriquehru){

      $rubriqueshrus = new Rubriquehru();
      $rubriqueshrus = $reporubriquehru->findAll();

      return $this->render('hru/showrubriques.html.twig', [
        'controller_name' => 'Hrushowrubriques',
        'rubriqueshrus'=>$rubriqueshrus,
      ]);

    }
    
    /**
     * @Route("hru/client/new", name ="hru_clientnew")
    */
    public function hruclient(Request $request,RubriquehruRepository $reporubriquehru){
      $entityManager = $this->getDoctrine()->getManager();

      $client= new client();
                        
      $form = $this->createForm(ClientType::class,$client);

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {

        $entityManager->persist($client);
        $entityManager->flush();

        return $this->redirectToRoute('hru_client_show',['idclient'=>$client->getId(),'idccn'=>$client->getCcnclient()]);
      }
      return $this->render('hru/createclient.html.twig',[
          'formClient'=>$form->createView(),
          'controller_name' => 'Add_client',


      ]);
      
    }

     /**
     * @Route("hru/client/{idclient}/show/{idccn}", name ="hru_client_show")
    */

    public function showccn(Request $request,RubriquehruRepository $reporubriquehru,ClientRepository $repoclient,$idclient,$idccn){
      
      $client = new client();
      $client = $repoclient->find($idclient);
      $rubriquehrus = new Rubriquehru();
      $rubriquehrus = $reporubriquehru->findBy(['ccn'=>$idccn]);
    

    return $this->render('hru/showclientrubriques.html.twig',[
      'client'=>$client,
      'rubriquehrus'=>$rubriquehrus,
      'controller_name' => 'show_client_rubrique',
      ]);

    }

    /**
     * @Route("hru/client/liste", name="hru_client_liste")          
     */

    public function listeclient(Request $request, ClientRepository $repoclient){
      
      $clients = new client();
      $clients = $repoclient->findAll();
      return $this->render('hru/listeclients.html.twig',[
        'clients'=>$clients,
        'controller_name' => 'liste_clients',
        ]);

    }

    /**
     * @Route("hru/client/{idclient}/rubrique/{idrubrique}", name="add_surcharge")       
     */

    public function addsurcharge(Request $request, $idclient,$idrubrique,RubriquehruRepository $reporubriquehru,ClientRepository $repoclient){
      $entityManager = $this->getDoctrine()->getManager();

      $client = new client();
      $client = $repoclient->find($idclient);
      $rubriquehru = new Rubriquehru();
      $rubriquehru = $reporubriquehru->findOneBy(['code'=>$idrubrique]);

      $surcharge = new Surcharge();

      $form = $this->createForm(SurchargeType::class,$surcharge);

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {

        $surcharge->setCoderubrique($rubriquehru->getCode());
        $surcharge->setIdclient($client->getId());
        $entityManager->persist($surcharge);
        $entityManager->flush();

        return $this->redirectToRoute('hru_client_show',['idclient'=>$client->getId(),'idccn'=>$client->getCcnclient()]);
      }
      return $this->render('hru/createsurcharge.html.twig',[
          'formSurcharge'=>$form->createView(),
          'controller_name' => 'Add_client',
      ]);

    }

    /**
     * @Route("hru/client/{idclient}/rubrique/{idrubrique}/show", name="show_surcharge")       
     */

    public function showsurcharge(Request $request, $idclient,$idrubrique,SurchargeRepository $reposurcharge){

      $sucharges = new Surcharge();
      $sucharges = $reposurcharge->findBy(['coderubrique'=>$idrubrique,
                                            'idclient'=>$idclient]);

      return $this->render('hru/showsurcharge.html.twig',[
        'surcharges'=>$sucharges,
        'controller_name' => 'showsurcharge',
    ]);

    }

}
