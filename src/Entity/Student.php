<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $NSC;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity=ClassRoom::class, inversedBy="students")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idclassroom;



    public function getNSC(): ?int
    {
        return $this->NSC;
    }

    public function setNSC(int $NSC): self
    {
        $this->NSC = $NSC;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIdclassroom(): ?ClassRoom
    {
        return $this->idclassroom;
    }

    public function setIdclassroom(?ClassRoom $idclassroom): self
    {
        $this->idclassroom = $idclassroom;

        return $this;
    }
}
