<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class Course
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    public int $id;

    /**
     * @ORM\ManyToMany(targetEntity=Student::class, mappedBy="courses")
     */
    private Collection $students;

    public function __construct(

        /**
        * @ORM\Column
        */
        public readonly string $nome
    )
    {
        $this->students = new ArrayCollection();
    }

    public function students(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): void
    {
        if ($this->students->contains($student)) {
            return;
        }
        
        $this->students->add($student);
        $student->enrollInCourse($this);
    }
}