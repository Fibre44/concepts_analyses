<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HruController extends AbstractController
{
    /**
     * @Route("/hru/{lien}", name="hru")
    */
    public function index(Request $request, $lien): Response
    {
        $fichier = $lien;
        $chemin='./../public/uploads/rubriques/';

        //$monfichier = fopen($chemin.$fichier, 'r+');
        //$ligne = fgets($monfichier);        
        //fclose($monfichier);
        $row =1;
        if (($handle = fopen($chemin.$fichier, "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
              $num = count($data);
              echo "<p> $num champs à la ligne $row: <br /></p>\n";
              $row++;
              for ($c=0; $c < $num; $c++) {
                  echo $data[$c] . "<br />\n";
              }
          }
          fclose($handle);
      }
        return $this->render('hru/index.html.twig', [
            'controller_name' => 'HruController',
            'fichier'=>$fichier,
            'num'=>$num,
            'row'=>$row,
        ]);
    }

    
 
}
