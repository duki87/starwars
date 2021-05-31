<?php

namespace App\GraphQL\Queries;

use App\Film;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class FilmQuery extends Query
{
    protected $attributes = [
        'name' => 'Film',
    ];

    public function type(): Type
    {
        return GraphQL::type('Film');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Film::findById($args['id']);
    }
}
