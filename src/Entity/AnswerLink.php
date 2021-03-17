<?php

namespace App\Entity;

use App\Repository\AnswerLinkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerLinkRepository::class)
 */
class AnswerLink
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Answer::class, inversedBy="targetAnswer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sourceAnswer;

    /**
     * @ORM\OneToOne(targetEntity=Answer::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $targetAnswer;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSourceAnswer(): ?Answer
    {
        return $this->sourceAnswer;
    }

    public function setSourceAnswer(?Answer $sourceAnswer): self
    {
        $this->sourceAnswer = $sourceAnswer;

        return $this;
    }

    public function getTargetAnswer(): ?Answer
    {
        return $this->targetAnswer;
    }

    public function setTargetAnswer(Answer $targetAnswer): self
    {
        $this->targetAnswer = $targetAnswer;

        return $this;
    }
}
