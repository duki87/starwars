<template>
    <default-layout>
        <v-container>
            <v-row class="mx-auto" align="center">
                <v-col class="mx-auto" align="center" md="8">
                    <v-card
                        :loading="loading"
                        class="mx-auto light-green lighten-5 px-2"
                        align="center"
                    >
                        <template slot="progress">
                            <v-progress-linear
                                color="deep-purple"
                                height="10"
                                indeterminate
                            ></v-progress-linear>
                        </template>

                        <v-card-title>Add New Film</v-card-title>
                        <v-form 
                            @submit.prevent="submit"
                            ref="form"
                        >
                            <div>
                                <v-text-field
                                label="Film Title"
                                id="title"
                                :rules="rules.title"
                                v-model="film.title"
                                hide-details="auto"
                                ></v-text-field>

                                <v-text-field
                                label="Episode ID"
                                id="episode_id"
                                :rules="rules.episode_id"
                                v-model="film.episode_id"
                                hide-details="auto"
                                ></v-text-field>

                                <v-textarea
                                class="mt-4 mb-0"
                                full-width
                                name="input-7-4"
                                label="Opening Crawl"
                                value=""
                                :rules="rules.opening_crawl"
                                v-model="film.opening_crawl"
                                ></v-textarea>

                                <v-text-field
                                label="Film Director"
                                id="director"
                                :rules="rules.director"
                                v-model="film.director"
                                hide-details="auto"
                                ></v-text-field>

                                <v-text-field
                                label="Film Producer"
                                id="producer"
                                :rules="rules.producer"
                                v-model="film.producer"
                                hide-details="auto"
                                ></v-text-field>

                                <v-menu
                                ref="menu"
                                v-model="menu"
                                :close-on-content-click="false"
                                :return-value.sync="date"
                                transition="scale-transition"
                                offset-y
                                min-width="auto"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            v-model="film.release_date"
                                            label="Release Date"
                                            prepend-icon="mdi-calendar"
                                            readonly
                                            v-bind="attrs"
                                            v-on="on"
                                        ></v-text-field>
                                    </template>
                                    <v-date-picker
                                        v-model="film.release_date"
                                        no-title
                                        scrollable
                                        >
                                        <v-spacer></v-spacer>
                                        <v-btn
                                            text
                                            color="primary"
                                            @click="menu = false"
                                        >
                                            Cancel
                                        </v-btn>
                                        <v-btn
                                            text
                                            color="primary"
                                            @click="$refs.menu.save(date)"
                                        >
                                            OK
                                        </v-btn>
                                    </v-date-picker>
                                </v-menu>
                            
                            </div>

                            <v-btn
                            class="mt-4 mb-4"
                            type="submit"
                            >
                            Add Film
                            </v-btn>
                        </v-form>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </default-layout>
</template>

<script>
    import DefaultLayout from '../layouts/DefaultLayout.vue';
    import { mapActions } from 'vuex';

    export default {
        components: {
            DefaultLayout,
        },
        data () {
            return {
                loading: false,
                date: new Date().toISOString().substr(0, 10),
                menu: false,
                rules: {
                    title: [
                        value => !!value || 'Required.',
                        value => (value && value.length >= 3) || 'Min 3 characters',
                    ],
                    episode_id: [
                        value => !!value || 'Required.',
                        value => !isNaN(value) || 'Episode ID must be numeric value',
                    ],
                    director: [
                        value => !!value || 'Required.',
                    ],
                    producer: [
                        value => !!value || 'Required.',
                    ],
                    opening_crawl: [
                        value => !!value || 'Required.',
                    ],
                },
                film: {
                    title: '',
                    episode_id: '',
                    opening_crawl: '',
                    director: '',
                    producer: '',
                    release_date: '',
                }
            }
        },
        computed: {

        },
        methods: {
            formatDate(value) {
                return moment(value).format('DD.MM.YYYY.');
            },
            createLink(id) {
                return `/films/${id}`;
            },
            submit() {
                if(this.$refs.form.validate()) {
                    this.$store.dispatch('addFilm', this.film);
                }
            },
            validate () {
                this.$refs.form.validate();
            },
        },
        beforeCreate() {
            //this.$store.dispatch('fetchFilms');
        },
        mounted() {
            //console.log(this.$store.state.films);
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
    height: 600px;
    object-fit: cover !important;
}
</style>