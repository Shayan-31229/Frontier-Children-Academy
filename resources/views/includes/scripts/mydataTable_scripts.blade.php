<!-- page specific plugin scripts -->
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    /*#dynamic-table-1
    .dynamic-table*/
    var tbl1;
    jQuery(function ($) {
        tbl1 = initializeSearchableDataTable('.tbl1');
        //initiate dataTables plugin
        //tbl1 = $(".tbl1").DataTable();

    });


    function initializeSearchableDataTable(selector) {
        let table = $(selector);

        // Get column count
        let columnCount = table.find('thead tr').first().find('th').length;

        // Build the second header row with inputs
        let searchRow = $('<tr>');
        table.find('thead tr th').each(function (index) {
            if (index === 0 || $(this).text().toLowerCase().includes('action')) {
                searchRow.append('<th></th>'); // No search for checkbox or action column
            } else {
                searchRow.append('<th><input type="text" placeholder="Search" class="form-control input-sm" style="width:80%;" /></th>');
            }
        });

        // Append to the thead
        table.find('thead').prepend(searchRow);

        // Initialize DataTable
        let dt = table.DataTable({
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    $('input', $(column.header()).closest('thead').find('tr:eq(0) th').eq(column.index()))
                        .on('keyup change clear', function () {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                });
            }
        });

        return dt;
    }



</script>