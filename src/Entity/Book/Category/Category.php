<?php

namespace OSW3\Base\Entity\Book\Category;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use OSW3\Base\Entity\Book\Book\Book;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\Collection;
use OSW3\Trait\Entity\Properties\SlugTrait;
use Doctrine\Common\Collections\ArrayCollection;
use OSW3\Base\Repository\Book\Category\CategoryRepository;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name: 'book_category')]
class Category
{
    /**
     * Translator domain
     * 
     * @var string
     */
    const DOMAIN = "book_category";

    // ID's
    // --

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;


    // CATEGORY DATA
    // --

    // Name

    #[ORM\Column(name: "name", type: Types::STRING, length: 80, nullable: false)]
    private ?string $name = null;

    // #[Gedmo\Slug(fields: ['name'])]
    // #[ORM\Column(name: "slug", type: Types::STRING, length: 80, unique: true, nullable: false)]
    // private ?string $slug = null;

    const SLUG_OPTIONS = ['properties' => ['name'], 'length' => 80];
    use SlugTrait;

    #[ORM\Column(name: "color", type: Types::STRING, length: 7, nullable: false)]
    private ?string $color = null;

    // Note
    
    #[ORM\Column(name: "note", type: Types::TEXT, nullable: true)]
    private string $note;


    // DATES
    // --

    #[ORM\Column(name: "created_at", type: Types::DATETIME_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $createdAt = null;
    
    #[ORM\Column(name: "updated_at", type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;


    // WORKFLOW
    // --

    #[ORM\Column(name: "state", length: 255, nullable: false, columnDefinition: "enum('created')")]
    private string $state = "created";


    // RELATIONSHIP
    // --

    #[ORM\ManyToMany(targetEntity: Book::class, mappedBy: 'categories')]
    private Collection $books;


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }
    
    // ID's
    // --

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    // public function getSlug(): ?string
    // {
    //     return $this->slug;
    // }

    public function getColor(): ?string
    {
        return $this->color;
    }
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function setNote(string $note): static
    {
        $this->note = $note;

        return $this;
    }
    public function getNote(): string
    {
        return $this->note;
    }


    // CATEGORY DATA
    // --



    // DATES
    // --

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): self
    {
        $this->createdAt = new \DateTimeImmutable;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(): self
    {
        $this->updatedAt = new \DateTime;

        return $this;
    }


    // WORKFLOW
    // --

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }


    // RELATIONSHIP
    // --

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->addCategory($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            $book->removeCategory($this);
        }

        return $this;
    }

}
