<?php

namespace Alura\Doctrine\Entity;
 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Phone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    public int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Student::class, inversedBy="phones")
     */
    public readonly Student $student;

    
    public function __construct(

        /**
         * @ORM\Column
         */
        public readonly string $number)
    {

    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }
}