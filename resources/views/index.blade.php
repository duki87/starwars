@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="jumbotron">
    <h1 class="display-4">Star Wars</h1>
    <h3>Documentation</h3>
    <p class="lead">To view full list of Star Wars Films, click <a href="{{ route('films.index') }}">here</a>.</p>
    <p class="lead">To view full list of Star Wars Starships which have > 84000 passengers, click <a href="{{ route('starship.index') }}">here</a>.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="https://github.com/duki87/starwars" role="button" target="_blank"><i class="fa fa-github" aria-hidden="true"></i> GitHub</a>
    </p>
    </div>
</div>
@endsection