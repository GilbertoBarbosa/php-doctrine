<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Phone;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();


$student = new Student('Aluno com telefones 2');
$student->addPhone(new Phone('(11) 1234-5678'));
$student->addPhone(new Phone('(11) 5555-6666'));

$entityManager->persist($student);
$entityManager->flush();
