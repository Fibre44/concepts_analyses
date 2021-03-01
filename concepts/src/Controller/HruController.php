<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Rubriquehru;
use App\Repository\RubriquehruRepository; 

class HruController extends AbstractController
{
    /**
     * @Route("/hru/{lien}", name="hru")
    */
    public function index(Request $request, $lien,RubriquehruRepository $reporubriquehru): Response
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
            $codesrubriques[]=substr($data[1],0,4);
            $ccns[]=substr($data[0],5,4);
            $rubriquehrus->setCcn(substr($data[0],5,4));
            //$rubriquehrus->setLibelle(substr($data[1],8,99));
            $rubriquehrus->setLibelle('test');

            $rubriquehrus->setCode(substr($data[1],0,4));          
            $entityManager->persist($rubriquehrus);
            $entityManager->flush();
            $rubriquehrus = new Rubriquehru();

            }
          fclose($handle);
      }
        return $this->render('hru/index.html.twig', [
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

    
 
}
