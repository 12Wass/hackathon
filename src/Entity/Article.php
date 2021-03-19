<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @Vich\Uploadable
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modifyAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @ORM\Column(type="boolean")
     */
    private $online;

    /**
     * @Vich\UploadableField(mapping="article_miniature", fileNameProperty="miniatureName")
     *
     * @var File|null
     */
    private $miniatureFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $miniatureName;

    /**
     * @Vich\UploadableField(mapping="article_couverture", fileNameProperty="couvertureName")
     *
     * @var File|null
     */
    private $couvertureFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $couvertureName;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\Slug(fields={"title"})
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="articles", cascade="persist")
     * @ORM\JoinColumn(nullable=true)
     */
    private $category;

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
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

    public function getModifyAt(): ?\DateTimeInterface
    {
        return $this->modifyAt;
    }

    public function setModifyAt(?\DateTimeInterface $modifyAt): self
    {
        $this->modifyAt = $modifyAt;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getOnline(): ?bool
    {
        return $this->online;
    }

    public function setOnline(bool $online): self
    {
        $this->online = $online;

        return $this;
    }

    public function setCouvertureFile(?File $couvertureFile = null): void
    {
        $this->couvertureFile = $couvertureFile;

        if (null !== $couvertureFile) {
            $this->modifyAt = new \DateTime();
        }
    }

    public function getCouvertureFile(): ?File
    {
        return $this->couvertureFile;
    }

    public function setCouvertureName(?string $couvertureName): void
    {
        $this->couvertureName = $couvertureName;
    }

    public function getCouvertureName(): ?string
    {
        return $this->couvertureName;
    }

    public function setMiniatureFile(?File $miniatureFile = null): void
    {
        $this->miniatureFile = $miniatureFile;

        if (null !== $miniatureFile) {
            $this->modifyAt = new \DateTime();
        }
    }

    public function getMiniatureFile(): ?File
    {
        return $this->miniatureFile;
    }

    public function setMiniatureName(?string $miniatureName): void
    {
        $this->miniatureName = $miniatureName;
    }

    public function getMiniatureName(): ?string
    {
        return $this->miniatureName;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
