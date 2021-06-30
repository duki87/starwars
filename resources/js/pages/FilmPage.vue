<template>
    <default-layout>
        <v-container fluid mx-auto>
            <v-row align="start">
                <v-col md="4">
                    <v-img
                        class="fitted"
                        :src="'/img/movies/'+film.episode_id+'.jpg'"
                        height="800px"
                    ></v-img>
                </v-col>
                <v-col md="8">
                    <v-card
                        :loading="loading"
                        class="mx-auto light-green lighten-5"
                        align="start"
                    >
                        <template slot="progress">
                        <v-progress-linear
                            color="deep-purple"
                            height="10"
                            indeterminate
                        ></v-progress-linear>
                        </template>

                        <v-card-title>{{ film.title }}</v-card-title>

                        <v-card-text>
                            <v-row
                                align="center"
                                class="mx-0"
                            >
                                <div class="my-4 text-subtitle-1">
                                    User rating
                                </div>
                                &nbsp;
                                <v-rating
                                :value="4.5"
                                color="amber"
                                dense
                                half-increments
                                readonly
                                size="14"
                                ></v-rating>

                                <div class="grey--text ms-4">
                                4.5 (413)
                                </div>
                            </v-row>

                            <div class="my-4 text-subtitle-1">
                                Film Plot
                            </div>

                            <div>{{ film.opening_crawl }}</div>
                        </v-card-text>

                        <v-divider class="mx-4"></v-divider>

                        <v-card-title>Director</v-card-title>
                        <v-card-text>
                            <div class="text-subtitle-1">{{ film.director }}</div>
                        </v-card-text>

                        <v-card-title>Producers</v-card-title>
                        <v-card-text>
                            <div class="text-subtitle-1">{{ film.producer }}</div>
                        </v-card-text>

                        <v-divider class="mx-4"></v-divider>
                        <v-card-title>Characters</v-card-title>
                        <v-card-text>
                            <v-chip-group
                                active-class="deep-purple accent-4 white--text"
                                column
                            >
                                <v-chip class="green white--text" v-for="(character, index) in film.characters" :key="index">
                                    <router-link style="text-decoration: none; color: inherit;" :to="'/characters/'+character.id">{{ character.name }}</router-link>
                                </v-chip>
                            </v-chip-group>
                        </v-card-text>

                        <v-card-actions></v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </default-layout>
</template>

<script>
    import DefaultLayout from '../layouts/DefaultLayout.vue';

    const filters = {
        all: films => films,
    }

    export default {
        components: {
            DefaultLayout,
        },
        data () {
            return {
                filters: filters,
                //REMOVE LATER
                loading: false,
                selection: 1,
            }
        },
        computed: {
            film () {
                return this.$store.state.film;
            },
        },
        methods: {
            formatDate(value) {
                return moment(value).format('DD.MM.YYYY.');
            },
            createLink(id) {
                return `/films/${id}`;
            },
            reserve () {
                this.loading = true
                setTimeout(() => (this.loading = false), 2000)
            },
        },
        beforeCreate() {
            this.$store.dispatch('getFilm');
        },
        created() {
            this.$store.dispatch('getFilm', this.$route.params.id);
        },
        mounted() {
            //console.log(this.$store.state.film);
        }
    }
</script>
<style lang="scss" scoped>
.container{
    max-width: 100vw;
    padding:10px;
}
.fitted {
    width: 100% !important;
    max-height: 800px;
    object-fit: cover !important;
}
</style>