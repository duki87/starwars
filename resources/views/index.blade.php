@extends('layouts.master')

@section('content')
{{--<div class="container-fluid">
    <div class="jumbotron transparent">
    <h1 class="display-4 mb-4">Star Wars | Documentation</h1>
	<h3>Film List</h3>
	<p class="lead">To view full list of Star Wars Films, click <a href="{{ route('films.index') }}">here</a>.</p>
    <h3>PHP Functions Test Case</h3>
	<p class="lead">Task 1: Repeat 3 times the contents of an array <span class="lead text-muted"> In console run command: php artisan command:array_repeat {your-arr}</span></p>
	<p class="lead">Task 2: Return input string without wovels, lowercased except first letter <span class="lead text-muted"> In console run command: php artisan command:reformat</span></p>
	<p class="lead">Task 3: Return the next binary number in a string <span class="lead text-muted"> In console run command: php artisan command:next_binary_number {your-array}</span></p>

    <h3>Star Wars API</h3>
	<p class="lead">Show all films where involved a given character acts: <span class="lead text-muted"> /api/people/{character_id}/films [GET]</span></p>
	<p class="lead">Show all planets created after 12/04/2014: <span class="lead text-muted"> /api/planets [GET]</span></p>
	<p class="lead">Show people starships which have > 84000 passengers in total: <span class="lead text-muted"> /api/starships [GET]</span></p>

    <h3>GraphQL API</h3>
	<p class="lead">Go to <a target="_blank" href="{{ url('/graphql-playground') }}">graphql playground to test.</a></p>
	<p class="lead">To see how to use graphQL for film routes, click <a href="{{ route('graphql.instructions') }}">here.</a></p>
    <hr class="my-4">
    <p class="lead">
        Github repository: <a class="btn btn-primary btn-lg" href="https://github.com/duki87/starwars" role="button" target="_blank"><i class="fa fa-github" aria-hidden="true"></i> GitHub</a>
    </p>
    </div>
</div>--}}
{{-- <router-view></router-view> --}}
@endsection
