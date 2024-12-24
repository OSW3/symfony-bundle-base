<?php

namespace OSW3\Base\Entity\Book\Author;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use OSW3\Base\Entity\Book\Book\Book;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use OSW3\Base\Repository\Book\Author\AuthorRepository;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name: 'book_author')]
class Author
{
    /**
     * Translator domain
     * 
     * @var string
     */
    const DOMAIN = "book_author";

    
    // ID's
    // --

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;


    // AUTHOR DATA
    // --

    #[ORM\Column(name: "firstname", type: Types::STRING, length: 40, nullable: false)]
    private ?string $firstname = null;

    #[ORM\Column(name: "lastname", type: Types::STRING, length: 40, nullable: false)]
    private ?string $lastname = null;


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

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: Book::class)]
    private Collection $books;



    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable;
        $this->books = new ArrayCollection;
    }

    
    // ID's
    // --

    public function getId(): ?int
    {
        return $this->id;
    }


    // AUTHOR DATA
    // --

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }


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

    #[ORM\PreUpdate]
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
            $book->setAuthor($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getAuthor() === $this) {
                $book->setAuthor(null);
            }
        }

        return $this;
    }

}
