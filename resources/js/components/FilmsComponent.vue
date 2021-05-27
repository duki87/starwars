<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Star Wars Film List</div>

                    <div class="card-body">
                        <vuetable ref="vuetable"
                            api-url="/api/films"
                            :fields="columnNames"
                            :data="films"
                            data-path=""
                            pagination-path=""
                        ></vuetable>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2';

    export default {
        components: {
            Vuetable
        },
        data() {
            return {
                columnNames: ["ID", "Title", "Opening", "Director", "Producer", "Release Date"],
                films: []
            }
        },
        methods: {
            getFilms() {
                return axios.get('/api/films')
                    .then((res) => {
                        console.log(res.data)
                        for(let film of res.data) {
                            this.films.push({ id: film.episode_id, title: film.title, opening_crawl: film.opening_crawl, director: film.director, producer: film.producer, release_date: film.release_date });
                        }
                        // if(res.data.length > 0) {
                        //     this.columnNames = Object.keys(res.data[0]);
                        // }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
        mounted() {
            this.getFilms();
        }
    }
</script>
