<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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

    /**
     * @ORM\OneToMany(targetEntity=Phone::class, mappedBy="student", cascade={"persist", "remove"})
     */
    private Collection $phones;
    
    public function __construct(

        /**
         * @ORM\Column
         */
        public string $name)
    {
        $this->phones = new ArrayCollection();
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }
    
    public function phones(): Collection
    {
        return $this->phones;
    }
}