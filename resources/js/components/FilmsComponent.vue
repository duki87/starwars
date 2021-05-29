<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Star Wars Film List</div>

                    <div class="card-body">
                        <vuetable ref="filmtable"
                            api-url="/api/films"
                            :fields="columnNames"
                            data-path=""
                            pagination-path=""
                        ></vuetable>
                        <div style="padding-top:10px">
                            <vuetable-pagination ref="pagination"
                                @vuetable-pagination:change-page="onChangePage"
                            ></vuetable-pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2';
    import VuetablePagination from "vuetable-2/src/components/VuetablePagination";

    export default {
        components: {
            Vuetable,
            VuetablePagination
        },
        data() {
            return {
                columnNames: ["episode_id", "title", "opening_crawl", "director", "producer", "release_date"],
                films: []
            }
        },
        methods: {
            onChangePage(page) {
                this.$refs.filmtable.changePage(page);
            },
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
            //this.getFilms();
        }
    }
</script>
