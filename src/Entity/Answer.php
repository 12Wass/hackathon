<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="boolean")
     */
    private $first;

    /**
     * @ORM\OneToMany(targetEntity=AnswerLink::class, mappedBy="sourceAnswer", cascade={"persist", "remove"})
     */
    private $answerLinks;

    public function __construct()
    {
        $this->answerLinks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getFirst(): ?bool
    {
        return $this->first;
    }

    public function setFirst(bool $first): self
    {
        $this->first = $first;

        return $this;
    }

    /**
     * @return Collection|AnswerLink[]
     */
    public function getTargetAnswer(): Collection
    {
        return $this->answerLinks;
    }

    public function addAnswerLinks(AnswerLink $answerLink): self
    {
        if (!$this->answerLinks->contains($answerLink)) {
            $this->answerLinks[] = $answerLink;
            $answerLink->setSourceAnswer($this);
        }

        return $this;
    }

    public function removeAnswerLinks(AnswerLink $answerLink): self
    {
        if ($this->answerLinks->removeElement($answerLink)) {
            // set the owning side to null (unless already changed)
            if ($answerLink->getSourceAnswer() === $this) {
                $answerLink->setSourceAnswer(null);
            }
        }

        return $this;
    }
}
