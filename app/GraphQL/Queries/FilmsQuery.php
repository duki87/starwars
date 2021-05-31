<?php

namespace App\GraphQL\Queries;

use App\Film;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class FilmsQuery extends Query
{
    protected $attributes = [
        'name' => 'Films',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Film'));
    }

    public function resolve($root, $args)
    {
        return Film::getData();
    }
}
