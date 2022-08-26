<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Entity; 
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;

/**
 * @ORM\Entity
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    public int $id;

    
    public function __construct(

        /**
         * @ORM\Column
         */
        public string $name)
    {

    }
}