import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const routes = [
    { path: '/films', component: require('./components/FilmsComponent.vue').default },
    { path: '/user/films/favorites', component: require('./components/FavoriteFilmsComponent.vue').default },
    { path: '/films/:id', component: require('./components/FilmComponent.vue').default },
    { path: '/characters/:id', component: require('./components/CharacterComponent.vue').default },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
});
  
export default router;