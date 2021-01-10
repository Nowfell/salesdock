var table = '';

function getProductData(val) {
    val = val || 'all';
    var selected_value = val;
    table = $('#products_table').DataTable({
        'destroy': true,
        'processing': true,
        'serverSide': true,
        'ajax': {
            'type':'GET',
            'url': 'products.php',
            'data': {
                'filter': selected_value
            }
        },
        'columns': [{
                data: 'sl_no'
            },
            {
                data: 'product_name'
            },
            {
                data: 'upload_speed'
            },
            {
                data: 'download_speed'
            },
            {
                data: 'technology'
            },
            {
                data: 'static_ip'
            },
        ]
    });
    return table;
}
$(function() {
    $('select').select2();
        getProductData();
    setTimeout(function() {
        $('#productFilter').on('change',function(){
            getProductData($(this).val());
        });
    },100);
});
