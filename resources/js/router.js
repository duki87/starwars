import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const routes = [
    { path: '/', component: require('./pages/HomePage.vue').default },
    { path: '/films', component: require('./pages/FilmsPage.vue').default },
    { path: '/user/films/favorites', component: require('./components/FavoriteFilmsComponent.vue').default },
    { path: '/films/add', component: require('./pages/AddFilmPage.vue').default },
    { path: '/films/:id', component: require('./pages/FilmPage.vue').default },
    { path: '/characters/:id', component: require('./components/CharacterComponent.vue').default },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
});
  
export default router;