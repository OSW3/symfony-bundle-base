<?php

namespace OSW3\Base\Entity\Book\Book;

use Doctrine\ORM\Mapping as ORM;
use OSW3\MediaBundle\Entity\Media;
use OSW3\Base\Repository\Book\Book\AttachmentRepository;

#[ORM\Entity(repositoryClass: AttachmentRepository::class)]
#[ORM\Table(name: 'book_attachments')]
class Attachment
{
    // ID's
    // --

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    // ATTACHMENT DATA
    // --

    #[ORM\Column(name: "type", nullable: false, columnDefinition: "enum('cover','booklet')")]
    private ?string $type = null;


    // RELATIONSHIP
    // --

    #[ORM\ManyToOne(inversedBy: 'attachments', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Book $book = null;

    // #[ORM\ManyToOne]
    // private ?Media $media = null;


    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =

    // ID's
    // --

    public function getId(): ?int
    {
        return $this->id;
    }


    // ATTACHMENT DATA
    // --

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


    // RELATIONSHIP
    // --

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    // public function getMedia(): ?Media
    // {
    //     return $this->media;
    // }

    // public function setMedia(?Media $media): self
    // {
    //     $this->media = $media;

    //     return $this;
    // }
}
