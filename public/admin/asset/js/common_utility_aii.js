function initDataTable_Custom(tbl_id) {
    var table_obj =       $('#'+tbl_id).dataTable( {
        "aaSorting": [[ 0, "desc" ]]
    } );
    return table_obj;
}

function initDataTable_Destroy_Custom(tbl_id) {
    var table_obj = $('#' + tbl_id + '').dataTable().fnDestroy();
    return table_obj;
}

function initDataTable_Custom_With_Footer_Search(tbl_id) {
    $('#'+tbl_id+' tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#'+tbl_id+'').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
}


function isNumberKey(evt) {

    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 46) {
        return false;
    }
    if (charCode != 46) {

        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        else {
            return true;
        }
    }

}