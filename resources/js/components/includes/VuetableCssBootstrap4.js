export default {
    table: {
      tableWrapper: '',
      tableHeaderClass: 'mb-0 align-middle',
      tableBodyClass: 'mb-0',
      tableClass: 'table table-bordered table-hover',
      loadingClass: 'loading',
      ascendingIcon: 'fa fa-chevron-up',
      descendingIcon: 'fa fa-chevron-down',
      ascendingClass: 'sorted-asc',
      descendingClass: 'sorted-desc',
      sortableIcon: '',
      detailRowClass: 'vuetable-detail-row',
      handleIcon: 'fa fa-bars text-secondary',
      renderIcon(classes, options) {
        return `<i class="${classes.join(' ')}"></i>`
      }
    },
    pagination: {
      wrapperClass: 'pagination float-right mb-2',
      activeClass: 'btn-primary',
      disabledClass: 'disabled',
      pageClass: 'btn rounded-0',
      linkClass: 'btn rounded-0',
      paginationClass: 'pagination',
      paginationInfoClass: 'float-left',
      dropdownClass: 'form-control',
      icons: {
        first: 'fa fa-angle-double-left',
        prev: 'fa fa-angle-left',
        next: 'fa fa-angle-right',
        last: 'fa fa-angle-double-right',
      }
    }
  }