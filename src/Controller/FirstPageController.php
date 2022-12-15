<?php

namespace App\Controller;

use PDO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstPageController extends AbstractController
{
    #[Route('/', name: 'app_first_page')]
    public function index(): Response
    {
        $connexion = $this->getConnexion();
        return $this->render('first_page/index.html.twig', [
            'controller_name' => 'FirstPageController',
            'connexion' => $connexion,
        ]);
    }

    public function getConnexion(){
        $connexion = false;
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=new_game', 'root', '', array(PDO::ATTR_PERSISTENT => true));
            $connexion = true;
        }
        catch (\Symfony\Component\Config\Definition\Exception\Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        return $connexion;
    }
}
