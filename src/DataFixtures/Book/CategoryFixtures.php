<?php

namespace OSW3\Base\DataFixtures\Book;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use OSW3\Base\Entity\Book\Category\Category;

class CategoryFixtures extends Fixture
{
    /**
     * Reference Prefix
     * 
     * @var string
     */
    public const PREFIX = "book-category-";

    const DATA = [
        [
            'name' => "Romans et Littérature",
            'color' => "#FF5733",
            'reference' => "fiction",
        ],
        [
            'name' => "Policier et Thriller",
            'color' => "#C70039",
            'reference' => "mystery_thriller",
        ],
        [
            'name' => "Science-Fiction et Fantastique",
            'color' => "#581845",
            'reference' => "sci_fi_fantasy",
        ],
        [
            'name' => "Jeunesse et Adolescents",
            'color' => "#33FF57",
            'reference' => "young_adult",
        ],
        [
            'name' => "Bandes Dessinées et Mangas",
            'color' => "#FFC300",
            'reference' => "comics_manga",
        ],
        [
            'name' => "Histoire",
            'color' => "#900C3F",
            'reference' => "history",
        ],
        [
            'name' => "Sciences et Techniques",
            'color' => "#3357FF",
            'reference' => "science_tech",
        ],
        [
            'name' => "Développement Personnel",
            'color' => "#DAF7A6",
            'reference' => "self_help",
        ],
        [
            'name' => "Cuisine et Gastronomie",
            'color' => "#FF9966",
            'reference' => "cookbooks",
        ],
        [
            'name' => "Arts et Loisirs Créatifs",
            'color' => "#6699FF",
            'reference' => "arts_crafts",
        ],
        [
            'name' => "Voyages et Découverte",
            'color' => "#FFCC66",
            'reference' => "travel",
        ],
        [
            'name' => "Essais et Documents",
            'color' => "#9900FF",
            'reference' => "essays",
        ],
        [
            'name' => "Langues et Apprentissage",
            'color' => "#33CCCC",
            'reference' => "languages",
        ],
        [
            'name' => "Religion et Spiritualité",
            'color' => "#FF6699",
            'reference' => "religion",
        ],
        [
            'name' => "Biographies et Mémoires",
            'color' => "#993300",
            'reference' => "biographies",
        ],
    ];
    
    

    public function load(ObjectManager $manager): void
    {
        foreach (self::DATA as $item)
        {
            $category = new Category;

            $category->setName( $item['name'] );
            $category->setColor( $item['color'] );

            $this->addReference( self::PREFIX . $item['reference'], $category );

            $manager->persist( $category );
        }

        $manager->flush();
    }
}
