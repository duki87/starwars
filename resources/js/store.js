import Vue from 'vue';
import Vuex from 'vuex';
import { apolloClient } from './apollo';
import gql from 'graphql-tag';

// type Film {
    // title: String,
    // episode_id: String,
    // director: String,
    // producer: String,
    // release_date: String,
// }

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
    # createFilm(objects: [{ input: $film }]) {
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

Vue.use(Vuex);

const state = {
    // todos: JSON.parse(window.localStorage.getItem(STORAGE_KEY) || '[]')
    films: [],
    film: {}
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
    // removeTodo (state, todo) {
    //   state.todos.splice(state.todos.indexOf(todo), 1)
    // },
    // editTodo (state, { todo, text = todo.text, done = todo.is_completed }) {
    //   todo.text = text
    //   todo.is_completed = done
    // }
}

const actions = {
    async addFilm ({ commit }, film) {
        const { data } = await apolloClient.mutate({ mutation: ADD_FILM, variables: {title: film.title, episode_id: film.episode_id, opening_crawl: film.opening_crawl, director: film.director, producer: film.producer, release_date: film.release_date}})
        if (data.createFilm.id) {
            commit('addFilm', data.createFilm)
        }
    },
    async fetchFilms ({ commit }) {
      const { data } = await apolloClient.query({query: GET_FILMS})
      commit('fetchFilms', data.allFilms)
    },
    // async getFilm ({ commit }, filmId) {
    //     const { data } = await apolloClient.query.mutate({mutation: filmQuery, variables: { id: filmId }})
    //     commit('getFilm', data.film)
    // },
    async getFilm({ commit }, filmId) {
        if(filmId === undefined) {
            commit('getFilm', {})
        } else {
            const { data } = await apolloClient.query({query: GET_FILM, variables: { id: filmId }})
            commit('getFilm', data.film)
        }

    },
}

export default new Vuex.Store({
    state,
    mutations,
    actions,
    //plugins
});