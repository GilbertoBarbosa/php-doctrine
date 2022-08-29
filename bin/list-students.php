<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "ID: $student->id\nNome: $student->name\n\n";
    echo "Telefones: \n";

    echo implode(', ', $student->phones()
            ->map(fn (Phone $phone) => $phone->number)
            ->toArray());

    echo "Cursos: \n";

    echo implode(', ', $student->courses()
            ->map(fn (Course $course) => $course->nome)
            ->toArray());

    echo PHP_EOL . PHP_EOL;
}

exit;

$student = $studentRepository->find(2);
echo $student->name;


$result = $studentRepository->findBy([
    'name' => 'Aluno teste'
]);

var_dump($result);



$result = $studentRepository->findOneBy([
    'name' => 'Aluno teste'
]);

var_dump($result);

//echo $studentRepository->count();