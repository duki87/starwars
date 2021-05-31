<?php

namespace App\GraphQL\Types;

use App\Film;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class FilmType extends GraphQLType
{
    protected $attributes = [
        'name' => 'film',
        'description' => 'Collection of star wars films and details.',
        'model' => Film::class
    ];


    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of a particular film',
            ],
            'episode_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Episode id',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the film',
            ],
            'opening_crawl' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of the film',
            ],
            'director' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the director of the film',
            ],
            'producer' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the director of the film',
            ],
            'release_date' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The year the film was released',
            ],
            // 'characters' => [
            //     'type' => Type::nonNull(Type::array()),
            //     'description' => 'The characters in film',
            // ],
            // 'planets' => [
            //     'type' => Type::nonNull(Type::array()),
            //     'description' => 'The planets in film',
            // ],
            // 'starships' => [
            //     'type' => Type::nonNull(Type::array()),
            //     'description' => 'The starships in film',
            // ],
            // 'vehicles' => [
            //     'type' => Type::nonNull(Type::array()),
            //     'description' => 'The vehicles in film',
            // ],
            // 'species' => [
            //     'type' => Type::nonNull(Type::array()),
            //     'description' => 'The species in film',
            // ],
            'created' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date created',
            ],
            'edited' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date edited',
            ],
            'url' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Api url',
            ]
        ];
    }
}
