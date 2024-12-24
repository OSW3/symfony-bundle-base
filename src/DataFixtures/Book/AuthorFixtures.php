<?php

namespace OSW3\Base\DataFixtures\Book;

use Doctrine\Persistence\ObjectManager;
use OSW3\Base\Entity\Book\Author\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class AuthorFixtures extends Fixture
{
    /**
     * Reference Prefix
     * 
     * @var string
     */
    public const PREFIX = "author-";

    /**
     * Fixtures data
     * 
     * @var array
     */
    public const DATA = [
        [
            'firstname' => "Pierre",
            'lastname'  => "DOE",
            'reference' => "pierre",
        ],
        [
            'firstname' => "Paul",
            'lastname'  => "DOE",
            'reference' => "paul",
        ],
        [
            'firstname' => "Roseline",
            'lastname'  => "DOE",
            'reference' => "roseline",
        ],
        [
            'firstname' => "Jean",
            'lastname'  => "DOE",
            'reference' => "jean",
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::DATA as $item)
        {
            $author = new Author;
            $author->setFirstname( $item['firstname'] );
            $author->setLastname( $item['lastname'] );

            $this->addReference( self::PREFIX . $item['reference'], $author );

            $manager->persist( $author );
        }

        $manager->flush();
    }
}
