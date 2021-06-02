@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="jumbotron">
    <h1 class="display-4 mb-4">GraphQL</h1>
    <h3>Instructions</h3>
<p class="lead">Go to <a target="_blank" href="{{ url('/graphql-playground') }}">graphql playground to test.</a></p>
	<p class="lead">In playground, type url: /swapi</p>
	<p class="lead">GraphQL queries for Film model:</p>

	{
  films(first: 5) {
    data {
      id
      title
      episode_id
      opening_crawl
      director
      producer
      release_date
      characters {
        id
        name
        height
        mass
        hair_color
        skin_color
        birth_year
        gender
        birth_year
      }
      planets {
        id
        name
        rotation_period
        orbital_period
        diameter
        climate
        gravity
        terrain
        surface_water
        population
      }
      starships {
        id
        name
        model
        manufacturer
        cost_in_credits
        length
        max_atmosphering_speed
        crew
        passengers
        cargo_capacity
        consumables
        hyperdrive_rating
        MGLT
        starship_class
      }
      vehicles {
        id
        name
        model
        manufacturer
        cost_in_credits
        length
        max_atmosphering_speed
        crew
        passengers
        cargo_capacity
        consumables
        vehicle_class
      }
      species {
        id
        name
        classification
        designation
        average_height
        skin_colors
        hair_colors
        eye_colors
        average_lifespan
        homeworld {
          id
          name
          rotation_period
          orbital_period
          diameter
          climate
          gravity
          terrain
          surface_water
          population
        }
        language
      }
    }
    paginatorInfo {
      currentPage
      lastPage
      hasMorePages
      firstItem
      lastItem
      count
    }
  }
}

    </div>
</div>
@endsection
