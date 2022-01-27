<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\Persistence\ManagerRegistry;

use App\Form\FilmType;
use App\Form\UploadType;
use App\Service\SearchFilmController;
use App\Repository\FilmRepository;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;



use App\Entity\Film;

class FilmController extends AbstractController
{
    /**
     * @Route("/film", name="film")
     */
     public function index()
     {
     $repo = $this->getDoctrine()->getRepository(Film::class);

     $films = $repo->findBy([], ['score' => 'DESC','nom' => 'ASC']);
       return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
            'films' => $films
        ]);
    }


       /**
    *@route("/", name="home")    //liée la fonction home à une @ bien particuliere
    */
    public function home() {      //cette fonction doit etre appeler lorsque
        return $this->render('film/home.html.twig');//render permet d'afficher le fichier twig et je dois liée cette fonction à une adresse bien particuliere

    }



              /**
              * @route("/film/new", name="film_create")
              * @route("/film/{id}/edit", name="film_edit")
              */

         public function form(Film $film=null, Request $request, EntityManagerInterface $manager){

                if(!$film){
                 $film=new Film();
                 }
                 /* $form = $this->createFormBuilder($film)
                               ->add('nom')
                               ->add('score')
                               ->add('numvoters')
                               ->add('email', TextType::class, array('mapped' => false))
                               ->getForm(); */

                 $form = $this->createForm(FilmType::class, $film);


                       $form-> handleRequest($request);

                      if($form->isSubmitted() && $form->isValid()){

                      $element=$form->getData();
                      $description = SearchFilmController::search($element->getNom());

                      $film = new Film;
                                  $film->setNom($element->getNom());
                                  $film->setScore($element->getScore());
                                  $film->setNumvoters($element->getNumvoters());
                                  $film->setDescription($description);
                                  //$film->setNb_votants($element->getNb_votants());


                      $manager->persist($film); // pour enregistrer dans la bdd
                      $manager->flush();
                      return $this->redirectToRoute('film_show',['id' => $film->getId()]);
                      }


                  return $this->render('film/create.html.twig', [
                         'formFilm' => $form->createView(),
                        'updateMode' => $film->getId() !== null
                 ]);
                 }




                 /**
                    * @Route("/film/upload", name="film_upload")
                    */

                     public function upload (){
                     $upload = new Film();
                     $form = $this-> createForm(UploadType::class, $upload);

                    /* $form->handleRequest($request);
                     if ($form->isSubmitted() && $form->isValid()){
                        $file = $upload->getName();
                        $fileName = md5(uniqueid()).'.'$file->guessExtension()*/

                     return $this->render('film/upload.html.twig',array(
                          'formUpload' => $form->createView(),
                     ));

                     }





                 /**
                 * @Route("/film/stats", name="film_stats")
                 */
               public function statistiques(FilmRepository $repo)
                {
                $films = $repo->countByScore();

                  $scores = [];
                  $filmsCount = [];

                foreach($films as $film){
                 $scores[] = $film['scoreFilm'];
                 $filmsCount[] = $film['count'];
                 }

                return $this->render('film/stats.html.twig', [
                  'filmNom'=>json_encode($scores),
                  'filmScore'=>json_encode($filmsCount)
                    ]);
                     }


                     /**
                        * @route("/film/{id}", name="film_show") // nom d'une route pour le montrer
                       */
                      public function show(Film $film){
                      // $repo = $this->getDoctrine()->getRepository(Film::class);

                     // $film = $repo->find($id);

                      return $this->render('film/show.html.twig',['film' => $film ]); // faut cette funtion etre relié à une adresse
    }


}
