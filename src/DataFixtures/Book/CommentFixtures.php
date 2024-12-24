<?php

namespace OSW3\Base\DataFixtures\Book;

use App\Entity\Book\Book\Book;
use App\Entity\Book\Comment\Comment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Reference Prefix
     * 
     * @var string
     */
    public const PREFIX = "book-comment-";

    /**
     * Fixtures data
     * 
     * @var array
     */
    const DATA = [];
    const _DATA = [

        [
            'title' => "The first comment",
            'content' => "This is the content of the first comment",
            'book' => "first"
        ],
        [
            'title' => "The second comment",
            'content' => "This is the content of the second comment",
            'book' => "first"
        ],
        [
            'title' => "The third comment",
            'content' => "This is the content of the third comment",
            'book' => "first"
        ]

    ];

    public function load(ObjectManager $manager): void
    {
        // foreach (self::DATA as $item)
        // {
        //     $comment = new Comment;
        //     $book = $this->getReference( BookFixtures::PREFIX . $item['book'] );

        //     $comment->setTitle( $item['title'] );
        //     $comment->setContent( $item['content'] );
        //     $comment->setBook( $book );

        //     $manager->persist( $comment );
        // }

        // $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BookFixtures::class
        ];
    }
}
