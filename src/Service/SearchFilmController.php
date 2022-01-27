<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchFilmController extends AbstractController
{


     public static function search($nomFilm){
             $descriptionFilm = NULL;
             $apiKey = '6a5a0e40';

              $url = "http://www.omdbapi.com/?apikey=" . $apiKey . "&t=" . str_replace(" ", "&20", $nomFilm);

                     $response = file_get_contents($url);

                     try{
                         $descriptionFilm = json_decode($response,true)["Plot"];
                     }catch (\Exception $e){
                         error_log($e->getMessage());
                     }


                     return $descriptionFilm;
                 }


             }



?>
