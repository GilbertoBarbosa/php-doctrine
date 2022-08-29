<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Helper\EntityManagerCreator;
use Alura\Doctrine\Entity\Phone;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$course = new Course($argv[1]);


$entityManager->persist($course);
$entityManager->flush();