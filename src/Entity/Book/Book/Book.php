<?php

namespace OSW3\Base\Entity\Book\Book;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use OSW3\Base\Entity\Book\Author\Author;
use Doctrine\Common\Collections\Collection;
use OSW3\Base\Entity\Book\Category\Category;
use OSW3\Trait\Entity\Properties\TitleTrait;
use Doctrine\Common\Collections\ArrayCollection;
use OSW3\Base\Repository\Book\Book\BookRepository;
use OSW3\Trait\Entity\Properties\SlugTrait;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ORM\HasLifecycleCallbacks()]
#[ORM\Table(name: 'book')]
class Book
{
    /**
     * Translator domain
     * 
     * @var string
     */
    const DOMAIN = "book";


    // ID's
    // --
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;


    // BOOK DATA
    // --

    use TitleTrait; 
    
    const SLUG_PROPERTIES = ['title'];
    use SlugTrait;

    // #[ORM\Column(name: 'title', type: Types::STRING, length: 120, nullable: false)]
    // private ?string $title = null;

    #[ORM\Column(name: 'description', type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'price', type: Types::DECIMAL, precision: 5, scale: 2, nullable: false)]
    private ?string $price = null;


    // DATES
    // --
    
    // #[ORM\Column(name: "created_at", type: Types::DATETIME_IMMUTABLE, nullable: false)]
    // private ?\DateTimeImmutable $createdAt = null;

    // #[ORM\Column(name: "updated_at", type: Types::DATETIME_MUTABLE, nullable: true)]
    // private ?\DateTimeInterface $updatedAt = null;

    // #[ORM\Column(name: "published_at", type: Types::DATETIME_MUTABLE, nullable: true)]
    // private ?\DateTimeInterface $publishedAt = null;


    // BOOLEAN FLAGS
    // --


    // WORKFLOW
    // --

    // #[ORM\Column(name: "state", nullable: false, columnDefinition: "enum('created','published','unpublished','deleted','erased')")]
    // private string $state = "created";


    // RELATIONSHIP
    // --

    // #[ORM\ManyToOne(inversedBy: 'books')]
    // #[ORM\JoinColumn(nullable: false)]
    // private ?Author $author = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'books')]
    #[ORM\JoinTable(name: "book_category_relations")]
    private Collection $categories;

    // #[Groups('comments')]
    // #[ORM\OneToMany(mappedBy: 'book', targetEntity: Comment::class, orphanRemoval: true)]
    // private Collection $comments;

    // #[ORM\OneToMany(mappedBy: 'book', targetEntity: Attachment::class)]
    // private Collection $attachments;



    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    public function __construct()
    {
        // $this->categories = new ArrayCollection;
        // // $this->comments = new ArrayCollection();
        // $this->attachments = new ArrayCollection();
    }


    // ID's
    // --

    public function getId(): ?int
    {
        return $this->id;
    }


    // BOOK DATA
    // --

    // public function getTitle(): ?string
    // {
    //     return $this->title;
    // }

    // public function setTitle(string $title): self
    // {
    //     $this->title = $title;

    //     return $this;
    // }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }


    // DATES
    // --

    // public function getCreatedAt(): ?\DateTimeImmutable
    // {
    //     return $this->createdAt;
    // }

    // #[ORM\PrePersist]
    // public function setCreatedAt(): self
    // {
    //     $this->createdAt = new \DateTimeImmutable;

    //     return $this;
    // }

    // public function getUpdatedAt(): ?\DateTimeInterface
    // {
    //     return $this->updatedAt;
    // }

    // #[ORM\PreUpdate]
    // public function setUpdatedAt(): self
    // {
    //     $this->updatedAt = new \DateTime;

    //     return $this;
    // }

    // public function getPublishedAt(): ?\DateTimeInterface
    // {
    //     return $this->publishedAt;
    // }

    // public function setPublishedAt(?\DateTimeInterface $publishedAt): self
    // {
    //     $this->publishedAt = $publishedAt;

    //     return $this;
    // }


    // BOOLEAN FLAGS
    // --


    // WORKFLOW
    // --

    // public function getState(): ?string
    // {
    //     return $this->state;
    // }

    // public function setState(string $state): self
    // {
    //     $this->state = $state;

    //     return $this;
    // }


    // // RELATIONSHIP
    // // --

    // public function getAuthor(): ?Author
    // {
    //     return $this->author;
    // }

    // public function setAuthor(?Author $author): self
    // {
    //     $this->author = $author;

    //     return $this;
    // }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    // /**
    //  * @return Collection<int, Comment>
    //  */
    // public function getComments(): Collection
    // {
    //     return $this->comments;
    // }

    // public function addComment(Comment $comment): self
    // {
    //     if (!$this->comments->contains($comment)) {
    //         $this->comments->add($comment);
    //         $comment->setBook($this);
    //     }

    //     return $this;
    // }

    // public function removeComment(Comment $comment): self
    // {
    //     if ($this->comments->removeElement($comment)) {
    //         // set the owning side to null (unless already changed)
    //         if ($comment->getBook() === $this) {
    //             $comment->setBook(null);
    //         }
    //     }

    //     return $this;
    // }

    /**
     * @return Collection<int, Attachment>
     */
    // public function getAttachments(): Collection
    // {
    //     return $this->attachments;
    // }

    // public function addAttachment(Attachment $attachment): self
    // {
    //     if (!$this->attachments->contains($attachment)) {
    //         $this->attachments->add($attachment);
    //         $attachment->setBook($this);
    //     }

    //     return $this;
    // }

    // public function removeAttachment(Attachment $attachment): self
    // {
    //     if ($this->attachments->removeElement($attachment)) {
    //         // set the owning side to null (unless already changed)
    //         if ($attachment->getBook() === $this) {
    //             $attachment->setBook(null);
    //         }
    //     }

    //     return $this;
    // }

    // public function isIsCommentAllowed(): ?bool
    // {
    //     return $this->isCommentAllowed;
    // }

    // public function isIsCommentLocked(): ?bool
    // {
    //     return $this->isCommentLocked;
    // }

}
