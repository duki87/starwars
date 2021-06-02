<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">Star Wars Film List</div>
                    <div class="card-body p-0">
                        <vuetable ref="vuetable"
                            api-url="/api/films"
                            :fields="fields"
                            data-path="data"
                            pagination-path=""
                            @vuetable:pagination-data="onPaginationData"
                            :css="css.table"
                        >
                            <div slot="date-slot" slot-scope="props">
                                <span>{{ formatDate(props.rowData.release_date) }}</span>
                            </div>
                            <div slot="tags-slot" slot-scope="props">
                                <a href="#">Starships({{ props.rowData.starships_count }})</a><br/>
                                <a href="#">Planets({{ props.rowData.planets_count }})</a><br/>
                                <a href="#">Characters({{ props.rowData.characters_count }})</a><br/>
                                <a href="#">Vehicles({{ props.rowData.vehicles_count }})</a><br/>
                                <a href="#">Species({{ props.rowData.species_count }})</a>
                            </div>
                        </vuetable>
                        <div style="padding-top:10px">
                            <vuetable-pagination ref="pagination"
                                @vuetable-pagination:change-page="onChangePage"
                                :css="css.pagination"
                                class="pull-right"
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
    import { VuetablePaginationMixin } from 'vuetable-2';
    import CssForBootstrap4 from './includes/VuetableCssBootstrap4.js';

    export default {
        components: {
            Vuetable,
            VuetablePagination
        },
        //mixins: [VuetablePaginationMixin],
        data() {
            return {
                fields: [
                    {
                        name: "episode_id",
                        title: '<i class="fa fa-tag"></i> ID',
                        sortField: "episode_id",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "title",
                        title: '<i class="fa fa-font"></i> Title',
                        sortField: "title",
                        titleClass: 'text-left align-middle',
                        dataClass: 'text-left align-middle',
                    },
                    {
                        name: "opening_crawl",
                        title: '<i class="fa fa-align-left"></i> Opening Crawl',
                        sortField: "opening_crawl",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-left align-middle',
                    },
                    {
                        name: "director",
                        title: '<i class="fa fa-video-camera"></i> Director',
                        sortField: "director",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "producer",
                        title: '<i class="fa fa-money"></i> Producer',
                        sortField: "producer",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "date-slot",
                        title: '<i class="fa fa-calendar"></i> Release Date',
                        sortField: "release_date",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "tags-slot",
                        title: '<i class="fa fa-random"></i> Relations',
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-left align-middle',
                    }
                ],
                films: [],
                css: CssForBootstrap4,
            }
        },
        computed: {

        },
        methods: {
            formatDate(date) {
                return moment(date).format('DD.MM.YYYY.');
            },
            onChangePage(page) {
                this.$refs.vuetable.changePage(page);
            },
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
        },
        mounted() {

        }
    }
</script>
