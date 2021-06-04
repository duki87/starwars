<template>
    <v-container>
        <v-data-table
            :headers="headers"
            :items="films"
            :items-per-page="5"
            class="elevation-1"
        >
        </v-data-table>
    </v-container>
</template>
<script>
    import { mapActions } from 'vuex';

    const filters = {
        all: films => films,
    }

    export default {
        data () {
        return {
            headers: [
                {
                    text: 'Episode ID',
                    align: 'start',
                    sortable: false,
                    value: 'episode_id',
                },
                { text: 'Title', value: 'title' },
                { text: 'Director', value: 'director' },
                { text: 'Producer', value: 'producer' },
                { text: 'Release Date', value: 'release_date' },
                { text: 'Details', value: '' },
            ],
            filters: filters,
        }
        },
        computed: {
            films () {
                return this.$store.state.films;
            },
        },
        methods: {
            formatDate(value) {
                return moment(value).format('DD.MM.YYYY.');
            },
        },
        beforeCreate() {
            this.$store.dispatch('fetchFilms');
        },
        mounted() {
            console.log(this.$store.state.films);
        }
    }
</script>