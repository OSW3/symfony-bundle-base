<?php

namespace OSW3\Base\DataFixtures\Book;

use OSW3\Base\Entity\Book\Book\Book;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use OSW3\Base\DataFixtures\Book\AuthorFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * Reference Prefix
     * 
     * @var string
     */
    public const PREFIX = "book-";

    /**
     * Fixtures data
     * 
     * @var array
     */
    const DATA = [
        [
            'title'          => "Le Meilleur des Mondes",
            'description'    => "Un roman d'anticipation de Aldous Huxley, explorant une société dystopique.",
            'price'          => 18.50,
            'createdBy'      => "jane.doe@library.com",
            'author'         => "Aldous Huxley",
            'allowedComment' => true,
            'category'       => "sci_fi_fantasy",
            'reference'      => "brave-new-world",
        ],
        [
            'title'          => "L'Art de la Cuisine Française",
            'description'    => "Un guide incontournable pour les amateurs de cuisine française.",
            'price'          => 30.00,
            'createdBy'      => "chef@library.com",
            'author'         => "Julia Child",
            'allowedComment' => true,
            'category'       => "cookbooks",
            'reference'      => "cuisine-art",
        ],
        [
            'title'          => "La Carte et le Territoire",
            'description'    => "Un roman contemporain récompensé par le prix Goncourt, écrit par Michel Houellebecq.",
            'price'          => 12.99,
            'createdBy'      => "admin@library.com",
            'author'         => "Michel Houellebecq",
            'allowedComment' => true,
            'category'       => "fiction",
            'reference'      => "carte-territoire",
        ],
        [
            'title'          => "Le Petit Prince",
            'description'    => "Une histoire poétique et philosophique pour enfants et adultes, par Antoine de Saint-Exupéry.",
            'price'          => 8.99,
            'createdBy'      => "child.books@library.com",
            'author'         => "Antoine de Saint-Exupéry",
            'allowedComment' => true,
            'category'       => "young_adult",
            'reference'      => "le-petit-prince",
        ],
        [
            'title'          => "L'Étranger",
            'description'    => "Un roman philosophique écrit par Albert Camus, questionnant l'absurdité de la vie.",
            'price'          => 10.50,
            'createdBy'      => "philo@library.com",
            'author'         => "Albert Camus",
            'allowedComment' => true,
            'category'       => "essays",
            'reference'      => "l-etranger",
        ],
        [
            'title'          => "Cosmos",
            'description'    => "Un ouvrage fascinant de Carl Sagan sur l'univers et notre place dans celui-ci.",
            'price'          => 22.90,
            'createdBy'      => "science@library.com",
            'author'         => "Carl Sagan",
            'allowedComment' => true,
            'category'       => "science_tech",
            'reference'      => "cosmos",
        ],
        [
            'title'          => "Astérix le Gaulois",
            'description'    => "Le premier tome des aventures d'Astérix, un classique de la bande dessinée.",
            'price'          => 9.99,
            'createdBy'      => "comics@library.com",
            'author'         => "René Goscinny, Albert Uderzo",
            'allowedComment' => true,
            'category'       => "comics_manga",
            'reference'      => "asterix-gaulois",
        ],
        [
            'title'          => "1984",
            'description'    => "Un classique dystopique de George Orwell.",
            'price'          => 14.99,
            'createdBy'      => "orwell@library.com",
            'author'         => "George Orwell",
            'allowedComment' => true,
            'category'       => "fiction",
            'reference'      => "1984",
        ],
        [
            'title'          => "Dune",
            'description'    => "Un chef-d'œuvre de science-fiction écrit par Frank Herbert.",
            'price'          => 19.99,
            'createdBy'      => "frank.herbert@library.com",
            'author'         => "Frank Herbert",
            'allowedComment' => true,
            'category'       => "sci_fi_fantasy",
            'reference'      => "dune",
        ],
        [
            'title'          => "Harry Potter à l'école des sorciers",
            'description'    => "Le début des aventures magiques de Harry Potter.",
            'price'          => 10.99,
            'createdBy'      => "rowling@library.com",
            'author'         => "J.K. Rowling",
            'allowedComment' => true,
            'category'       => "young_adult",
            'reference'      => "harry-potter-1",
        ],
        [
            'title'          => "Le Seigneur des Anneaux: La Communauté de l'Anneau",
            'description'    => "Le premier volume de la célèbre trilogie fantastique.",
            'price'          => 17.50,
            'createdBy'      => "tolkien@library.com",
            'author'         => "J.R.R. Tolkien",
            'allowedComment' => true,
            'category'       => "sci_fi_fantasy",
            'reference'      => "lord-of-the-rings-1",
        ],
        [
            'title'          => "La Peste",
            'description'    => "Une œuvre puissante sur l'humanité face à une épidémie.",
            'price'          => 12.00,
            'createdBy'      => "camus@library.com",
            'author'         => "Albert Camus",
            'allowedComment' => true,
            'category'       => "essays",
            'reference'      => "la-peste",
        ],
        [
            'title'          => "L'Origine des Espèces",
            'description'    => "Une œuvre fondatrice de Charles Darwin sur l'évolution.",
            'price'          => 15.00,
            'createdBy'      => "darwin@library.com",
            'author'         => "Charles Darwin",
            'allowedComment' => true,
            'category'       => "science_tech",
            'reference'      => "origin-of-species",
        ],
        [
            'title'          => "La Promesse de l'Aube",
            'description'    => "Une autobiographie touchante et inspirante.",
            'price'          => 11.99,
            'createdBy'      => "gary@library.com",
            'author'         => "Romain Gary",
            'allowedComment' => true,
            'category'       => "biographies",
            'reference'      => "promise-at-dawn",
        ],
        [
            'title'          => "L'Alchimiste",
            'description'    => "Un conte philosophique de Paulo Coelho.",
            'price'          => 9.99,
            'createdBy'      => "coelho@library.com",
            'author'         => "Paulo Coelho",
            'allowedComment' => true,
            'category'       => "fiction",
            'reference'      => "alchemist",
        ],
        [
            'title'          => "Sapiens : Une brève histoire de l'humanité",
            'description'    => "Une réflexion sur l'histoire et l'évolution de l'humanité.",
            'price'          => 24.99,
            'createdBy'      => "harari@library.com",
            'author'         => "Yuval Noah Harari",
            'allowedComment' => true,
            'category'       => "essays",
            'reference'      => "sapiens",
        ],
        [
            'title'          => "Moby Dick",
            'description'    => "Une épopée maritime captivante d'Herman Melville.",
            'price'          => 14.50,
            'createdBy'      => "melville@library.com",
            'author'         => "Herman Melville",
            'allowedComment' => true,
            'category'       => "fiction",
            'reference'      => "moby-dick",
        ],
        [
            'title'          => "Le Petit Livre des Gâteaux",
            'description'    => "Recettes simples et délicieuses pour tous les gourmands.",
            'price'          => 7.99,
            'createdBy'      => "recipes@library.com",
            'author'         => "Claire Fontaine",
            'allowedComment' => true,
            'category'       => "cookbooks",
            'reference'      => "cake-book",
        ],
        [
            'title'          => "La Terre Vue du Ciel",
            'description'    => "Un magnifique recueil de photographies de Yann Arthus-Bertrand.",
            'price'          => 29.99,
            'createdBy'      => "photography@library.com",
            'author'         => "Yann Arthus-Bertrand",
            'allowedComment' => true,
            'category'       => "arts_crafts",
            'reference'      => "earth-from-above",
        ],
        [
            'title'          => "Voyage au Centre de la Terre",
            'description'    => "Un classique d'aventure et de science-fiction.",
            'price'          => 10.00,
            'createdBy'      => "verne@library.com",
            'author'         => "Jules Verne",
            'allowedComment' => true,
            'category'       => "sci_fi_fantasy",
            'reference'      => "journey-to-center",
        ],
        [
            'title'          => "Le Guide du Routard : Paris",
            'description'    => "Découvrez les meilleurs endroits de Paris.",
            'price'          => 12.50,
            'createdBy'      => "travel@library.com",
            'author'         => "Collectif",
            'allowedComment' => true,
            'category'       => "travel",
            'reference'      => "paris-guide",
        ],
        [
            'title'          => "Le Meilleur de la Musique Classique",
            'description'    => "Un guide pour découvrir les grands compositeurs.",
            'price'          => 19.99,
            'createdBy'      => "music@library.com",
            'author'         => "Jean Dupont",
            'allowedComment' => true,
            'category'       => "arts_crafts",
            'reference'      => "classic-music",
        ],
        [
            'title'          => "Apprendre le JavaScript",
            'description'    => "Une introduction pratique à la programmation.",
            'price'          => 16.99,
            'createdBy'      => "coding@library.com",
            'author'         => "John Smith",
            'allowedComment' => true,
            'category'       => "science_tech",
            'reference'      => "learn-js",
        ],
        [
            'title'          => "Les Piliers de la Terre",
            'description'    => "Un roman historique captivant de Ken Follett.",
            'price'          => 13.99,
            'createdBy'      => "follett@library.com",
            'author'         => "Ken Follett",
            'allowedComment' => true,
            'category'       => "fiction",
            'reference'      => "pillars-of-earth",
        ],
        [
            'title'          => "L'Homme Dévasté",
            'description'    => "Un thriller psychologique à couper le souffle.",
            'price'          => 18.50,
            'createdBy'      => "thriller@library.com",
            'author'         => "Jane Doe",
            'allowedComment' => true,
            'category'       => "mystery_thriller",
            'reference'      => "devastated-man",
        ],
        [
            'title'          => "Les Misérables",
            'description'    => "Un chef-d'œuvre intemporel de Victor Hugo.",
            'price'          => 15.99,
            'createdBy'      => "hugo@library.com",
            'author'         => "Victor Hugo",
            'allowedComment' => true,
            'category'       => "classics",
            'reference'      => "les-miserables",
        ],
        [
            'title'          => "Crime et Châtiment",
            'description'    => "Une plongée fascinante dans l'âme humaine.",
            'price'          => 14.50,
            'createdBy'      => "dostoievski@library.com",
            'author'         => "Fiodor Dostoïevski",
            'allowedComment' => true,
            'category'       => "classics",
            'reference'      => "crime-and-punishment",
        ],
        [
            'title'          => "Le Comte de Monte-Cristo",
            'description'    => "Une histoire de vengeance et de rédemption.",
            'price'          => 18.99,
            'createdBy'      => "dumas@library.com",
            'author'         => "Alexandre Dumas",
            'allowedComment' => true,
            'category'       => "fiction",
            'reference'      => "monte-cristo",
        ],
        [
            'title'          => "Cinquante nuances de Grey",
            'description'    => "Un roman captivant et controversé.",
            'price'          => 9.99,
            'createdBy'      => "james@library.com",
            'author'         => "E.L. James",
            'allowedComment' => false,
            'category'       => "romance",
            'reference'      => "fifty-shades",
        ],
        [
            'title'          => "Les Animaux Fantastiques",
            'description'    => "L'univers magique de J.K. Rowling s'étend.",
            'price'          => 12.50,
            'createdBy'      => "rowling@library.com",
            'author'         => "J.K. Rowling",
            'allowedComment' => true,
            'category'       => "sci_fi_fantasy",
            'reference'      => "fantastic-beasts",
        ],
        [
            'title'          => "Astérix chez les Bretons",
            'description'    => "Une bande dessinée hilarante et culte.",
            'price'          => 8.99,
            'createdBy'      => "uderzo@library.com",
            'author'         => "René Goscinny et Albert Uderzo",
            'allowedComment' => true,
            'category'       => "comics",
            'reference'      => "asterix-bretons",
        ],
        [
            'title'          => "Le Monde de Sophie",
            'description'    => "Une introduction à la philosophie.",
            'price'          => 11.50,
            'createdBy'      => "gaardner@library.com",
            'author'         => "Jostein Gaarder",
            'allowedComment' => true,
            'category'       => "essays",
            'reference'      => "sophies-world",
        ],
        [
            'title'          => "Un Sac de Billes",
            'description'    => "Une histoire touchante sur la guerre et l'enfance.",
            'price'          => 9.99,
            'createdBy'      => "joffo@library.com",
            'author'         => "Joseph Joffo",
            'allowedComment' => true,
            'category'       => "biographies",
            'reference'      => "sac-de-billes",
        ],
        [
            'title'          => "Cendrillon",
            'description'    => "Un conte classique revisité pour les enfants.",
            'price'          => 5.50,
            'createdBy'      => "disney@library.com",
            'author'         => "Charles Perrault",
            'allowedComment' => true,
            'category'       => "kids",
            'reference'      => "cinderella",
        ],
        [
            'title'          => "Percy Jackson : Le Voleur de Foudre",
            'description'    => "Le premier tome des aventures de Percy Jackson.",
            'price'          => 13.50,
            'createdBy'      => "riordan@library.com",
            'author'         => "Rick Riordan",
            'allowedComment' => true,
            'category'       => "young_adult",
            'reference'      => "percy-jackson-1",
        ],
        [
            'title'          => "Éloge de la Lenteur",
            'description'    => "Une réflexion sur notre société toujours plus rapide.",
            'price'          => 10.99,
            'createdBy'      => "honore@library.com",
            'author'         => "Carl Honoré",
            'allowedComment' => true,
            'category'       => "essays",
            'reference'      => "in-praise-of-slow",
        ],
        [
            'title'          => "La Nuit des Temps",
            'description'    => "Un roman culte d'amour et de science-fiction.",
            'price'          => 12.99,
            'createdBy'      => "barjavel@library.com",
            'author'         => "René Barjavel",
            'allowedComment' => true,
            'category'       => "sci_fi_fantasy",
            'reference'      => "la-nuit-des-temps",
        ],
        [
            'title'          => "Les Fleurs du Mal",
            'description'    => "Un recueil de poèmes intemporel.",
            'price'          => 7.50,
            'createdBy'      => "baudelaire@library.com",
            'author'         => "Charles Baudelaire",
            'allowedComment' => true,
            'category'       => "poetry",
            'reference'      => "fleurs-du-mal",
        ],
        [
            'title'          => "Le Petit Prince",
            'description'    => "Un conte poétique et philosophique.",
            'price'          => 6.99,
            'createdBy'      => "saint-exupery@library.com",
            'author'         => "Antoine de Saint-Exupéry",
            'allowedComment' => true,
            'category'       => "kids",
            'reference'      => "little-prince",
        ],
        [
            'title'          => "La Princesse de Clèves",
            'description'    => "Un classique de la littérature française.",
            'price'          => 9.50,
            'createdBy'      => "lafayette@library.com",
            'author'         => "Madame de La Fayette",
            'allowedComment' => true,
            'category'       => "classics",
            'reference'      => "princesse-de-cleves",
        ],
        [
            'title'          => "À la recherche du temps perdu",
            'description'    => "Une fresque magistrale sur le temps et la mémoire.",
            'price'          => 19.99,
            'createdBy'      => "proust@library.com",
            'author'         => "Marcel Proust",
            'allowedComment' => true,
            'category'       => "classics",
            'reference'      => "temps-perdu",
        ],
        [
            'title'          => "Devenir",
            'description'    => "L'autobiographie inspirante de Michelle Obama.",
            'price'          => 16.50,
            'createdBy'      => "obama@library.com",
            'author'         => "Michelle Obama",
            'allowedComment' => true,
            'category'       => "biographies",
            'reference'      => "becoming",
        ],
        [
            'title'          => "L'Homme qui voulait être heureux",
            'description'    => "Un roman philosophique et inspirant.",
            'price'          => 11.99,
            'createdBy'      => "gounelle@library.com",
            'author'         => "Laurent Gounelle",
            'allowedComment' => true,
            'category'       => "fiction",
            'reference'      => "happy-man",
        ],
        [
            'title'          => "Une vie",
            'description'    => "Un classique réaliste de Maupassant.",
            'price'          => 9.99,
            'createdBy'      => "maupassant@library.com",
            'author'         => "Guy de Maupassant",
            'allowedComment' => true,
            'category'       => "classics",
            'reference'      => "une-vie",
        ],
        [
            'title'          => "Le Capital au XXIe siècle",
            'description'    => "Une analyse économique contemporaine.",
            'price'          => 21.50,
            'createdBy'      => "piketty@library.com",
            'author'         => "Thomas Piketty",
            'allowedComment' => true,
            'category'       => "essays",
            'reference'      => "capital-21st",
        ],
    ];
    

    public function load(ObjectManager $manager): void
    {
        foreach (self::DATA as $item)
        {
            $book = new Book;
        //     $author = $this->getReference( AuthorFixtures::PREFIX . $item['author'] );

            $book->setTitle( $item['title'] );
            $book->setDescription( $item['description'] );
            $book->setPrice( $item['price'] );
            // $book->setAuthor( $author );
            // $book->setCreateBy( $this->getReference( $item['createdBy'] ));
            // $book->setIsCommentAllowed( $item['allowedComment'] ?? false );

        //     if (isset($item['reference']))
        //     {
                $this->addReference( self::PREFIX . $item['reference'], $book );
        //     }

            $manager->persist( $book );
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AuthorFixtures::class
        ];
    }
}
