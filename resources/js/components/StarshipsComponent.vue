<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Star Wars Starship List</div>
                    <div class="card-body p-0">
                        <vuetable ref="vuetable"
                            api-url="/api/starships"
                            :fields="fields"
                            data-path="data"
                            pagination-path=""
                            @vuetable:pagination-data="onPaginationData"
                            :css="css.table"
                        >
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
                        name: "name",
                        title: '<i class="fa fa-font"></i> Name',
                        sortField: "name",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "model",
                        title: '<i class="fa fa-font"></i> Model',
                        sortField: "model",
                        titleClass: 'text-left align-middle',
                        dataClass: 'text-left align-middle',
                    },
                    {
                        name: "manufacturer",
                        title: '<i class="fa fa-industry"></i> Manufacturer',
                        sortField: "manufacturer",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-left align-middle',
                    },
                    {
                        name: "cost_in_credits",
                        title: '<i class="fa fa-money"></i> Cost',
                        sortField: "cost_in_credits",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "length",
                        title: '<i class="fa fa-arrows-h"></i> Length',
                        sortField: "length",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "max_atmosphering_speed",
                        title: '<i class="fa fa-fighter-jet"></i> Speed',
                        sortField: "max_atmosphering_speed",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "crew",
                        title: '<i class="fa fa-users"></i> Crew',
                        sortField: "crew",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },
                    {
                        name: "passengers",
                        title: '<i class="fa fa-users"></i> Passengers',
                        sortField: "passengers",
                        titleClass: 'text-center align-middle',
                        dataClass: 'text-center align-middle',
                    },

                ],
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
