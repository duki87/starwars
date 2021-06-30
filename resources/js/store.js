import Vue from 'vue';
import Vuex from 'vuex';
import { apolloClient } from './apollo';
import gql from 'graphql-tag';

const GET_FILMS = gql`{
    allFilms {
        title,
        id,
        episode_id,
        director,
        producer,
        release_date
    }
}`;

const GET_FILM = gql`
    query($id: ID!) {
        film(id: $id) {
            title,
            id,
            episode_id,
            director,
            producer,
            release_date,
            opening_crawl,
            characters {
                id
                name
            }
            cover {
                url
            }
        }
    }`;

const ADD_FILM = gql`
    mutation addFilm(
        $title: String!
        $episode_id: String!
        $opening_crawl: String!
        $director: String!
        $producer: String!
        $release_date: String!
    ) {
    createFilm(input: {
        title: $title
        episode_id: $episode_id
        opening_crawl: $opening_crawl
        director: $director
        producer: $producer
        release_date: $release_date
    }) {
        title,
        id,
        episode_id,
        director,
        producer,
        release_date
    }
}`

const DELETE_FILM = gql`
  mutation deleteFilm($id: ID!) {
    deleteFilm(id: $id) {
      id
    }
}`

const GET_PEOPLE = gql`{
    allPeople {
        name,
        id,
    }
}`;

const GET_STARSHIPS = gql`{
    allStarships {
        name,
        id,
    }
}`;

const GET_PLANETS = gql`{
    allPlanets {
        name,
        id,
    }
}`;

const GET_VEHICLES = gql`{
    allVehicles {
        name,
        id,
    }
}`;

const GET_SPECIES = gql`{
    allSpecies {
        name,
        id,
    }
}`;

Vue.use(Vuex);

const state = {
    // todos: JSON.parse(window.localStorage.getItem(STORAGE_KEY) || '[]')
    films: [],
    film: {},
    people: [],
    starships: [],
    planets: [],
    vehicles: [],
    species: []
}

const mutations = {
    fetchFilms (state, films) {
      state.films = films;
    },
    getFilm (state, film) {
        state.film = film;
    },
    addFilm (state, film) {
      state.films.unshift(film)
    },
    deleteFilm (state, filmId) {
        let id = state.films.findIndex(film => film.id == filmId);
        state.films.splice(id, 1);
    },
    fetchPeople (state, people) {
        state.people = people;
    },
    fetchStarships (state, starships) {
        state.starships = starships;
    },
    fetchPlanets (state, planets) {
        state.planets = planets;
    },
    fetchVehicles (state, vehicles) {
        state.vehicles = vehicles;
    },
    fetchSpecies (state, species) {
        state.species = species;
    },

    // editTodo (state, { todo, text = todo.text, done = todo.is_completed }) {
    //   todo.text = text
    //   todo.is_completed = done
    // }
}

const actions = {
    async addFilm ({ commit }, film) {
        const { data } = await apolloClient.mutate({ mutation: ADD_FILM, variables: {title: film.title, episode_id: film.episode_id, opening_crawl: film.opening_crawl, director: film.director, producer: film.producer, release_date: film.release_date}})
        if (data.createFilm.id) {
            console.log(data.createFilm)
            commit('addFilm', data.createFilm)
        }
    },
    async fetchFilms ({ commit }) {
      const { data } = await apolloClient.query({query: GET_FILMS})
      commit('fetchFilms', data.allFilms)
    },
    async deleteFilm ({ commit }, filmId) {
        const { data } = await apolloClient.mutate({mutation: DELETE_FILM, variables: {id: filmId}})
        console.log(data)
        if(data.deleteFilm.id) {
            commit('deleteFilm', data.deleteFilm.id)
        }
    },
    async getFilm({ commit }, filmId) {
        if(filmId === undefined) {
            commit('getFilm', {})
        } else {
            const { data } = await apolloClient.query({query: GET_FILM, variables: { id: filmId }})
            commit('getFilm', data.film)
        }

    },
    async fetchPeople ({ commit }) {
      const { data } = await apolloClient.query({query: GET_PEOPLE})
      commit('fetchPeople', data.allPeople);
    },
    async fetchStarships ({ commit }) {
        const { data } = await apolloClient.query({query: GET_STARSHIPS})
        commit('fetchStarships', data.allStarships);
    },
    async fetchPlanets ({ commit }) {
        const { data } = await apolloClient.query({query: GET_PLANETS})
        commit('fetchPlanets', data.allPlanets);
    },
    async fetchVehicles ({ commit }) {
        const { data } = await apolloClient.query({query: GET_VEHICLES})
        commit('fetchVehicles', data.allVehicles);
    },
    async fetchSpecies ({ commit }) {
        const { data } = await apolloClient.query({query: GET_SPECIES})
        commit('fetchSpecies', data.allSpecies);
    },
    
}

export default new Vuex.Store({
    state,
    mutations,
    actions,
    //plugins
});