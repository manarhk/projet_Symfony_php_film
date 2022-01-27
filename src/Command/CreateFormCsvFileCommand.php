<?php

namespace App\Command;
use App\Repository\FilmRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Serializer;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Film;




class CreateFormCsvFileCommand extends Command
{
protected static $defaultName = 'app:importe-file';

 public function __construct($projectDir, EntityManagerInterface $manager){
 $this->projectDir = $projectDir;
 $this->manager = $manager;

 parent::__construct();

 }

      protected function configure()
      {
          $this->setDescription('la description');

      }


      protected function execute(InputInterface $input, OutputInterface $output)
      {

           $filmProject = $this->getCsvRowsAsArrays();

           /** @var FilmRepository $filmRepo*/
                $filmRepo = $this->manager->getRepository(Film::class);

               foreach ($filmProject as $filmProjects){

                if($existingFilm = $filmRepo->findOneBy(['nom' => $filmProjects['nom']])){

               $this->updateFilm($existingFilm, $filmProject);

              continue;
      }

             $this->createFilm($filmProject);
    }
                  $this->manager->flush();
                  $io = new SymfonyStyle ($input, $output);
                   $io->success('okeey');

                   return Command::SUCCESS;
   }
          public function createFilm($filmProject){

                 $newFilm = new Film();
                          $newFilm->setNom($filmProject['nom']);
                          $newFilm->setScore($filmProject['score']);
                          $newFilm->setNumvoters($filmProject['numvoters']);
                          $newFilm->setDescription($filmProject['description']);

                         $this->manager->persist($newFilm);


      }

             public function updateFilm($existingFilm, $filmProject){

                  $existingFilm->setFilmScore($filmProject['score']);
                   $existingFilm->setFilmDescription($filmProject['description']);

      }


             public function getCsvRowsAsArrays(){
                  $inputFile = $this->projectDir . '/public/uploads/filmsImport.csv';

                  $decoder = new Serializer ([new ObjectNormalizer()], [new CsvEncoder()]);

                  return $decoder->decode(file_get_contents($inputFile), 'csv');

      }

}




