import Vue from 'vue';
import Vuex from 'vuex';
import { apolloClient } from './apollo';
import gql from 'graphql-tag';

const filmsQuery = gql`{
    allFilms {
        title,
        id,
        episode_id,
        director,
        producer,
        release_date
    }
}`;

Vue.use(Vuex);

const state = {
    // todos: JSON.parse(window.localStorage.getItem(STORAGE_KEY) || '[]')
    films: []
}

const mutations = {
    fetchFilms (state, films) {
      state.films = films;
    },
    // addTodo (state, todo) {
    //   state.todos.unshift(todo)
    // },
    // removeTodo (state, todo) {
    //   state.todos.splice(state.todos.indexOf(todo), 1)
    // },
    // editTodo (state, { todo, text = todo.text, done = todo.is_completed }) {
    //   todo.text = text
    //   todo.is_completed = done
    // }
}

const actions = {
    async fetchFilms ({ commit }) {
      const { data } = await apolloClient.query({query: filmsQuery})
      commit('fetchFilms', data.allFilms)
    },
}

export default new Vuex.Store({
    state,
    mutations,
    actions,
    //plugins
});