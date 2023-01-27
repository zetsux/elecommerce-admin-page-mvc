// When the docs is ready, run the method inside (JQuery)
$(function() {
    // Find an element with the class 'addProductButton' and set the on click to thefunction
    $('.addProductButton').on('click', function() {
        $('#addmodalLabel').html('Add New Product');
        $('.modal-footer button[type=submit]').html('Save Product');
        $('#aimage').attr('required');

        $('#aname').attr("placeholder", "ex : iPhone 14 Pro Max 128GB");
        $('#aname').val("");
        $('#aseller').attr("placeholder", "ex : John Smith Weber");
        $('#aseller').val("");
        $('#aprice').attr("placeholder", "ex : 22999999");
        $('#aprice').val("");

        $('#abrand').val("");
        $('#acategory').val("");

        $('#oldimage').attr("src", "");
        $('#oldimage').attr("class", "img-thumbnail shadow mt-1 mb-4 d-none");

        $('.modal-body form').attr('action', 'http://localhost/phplearn/phpmvc/public/products/new');
    })

    // Find an element with the class 'showEditModal' and set the on click to thefunction
    $('.showEditModal').on('click', function() {
        $('#addmodalLabel').html('Edit Existing Product');
        $('.modal-footer button[type=submit]').html('Save Changes');
        
        const id = $(this).data('id');
        
        // Run Ajax in JQuery (Request data without fully reloading the page)
        $.ajax({
            url: 'http://localhost/phplearn/phpmvc/public/products/getedit',
            data: {id: id},
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#aid').val(data.id);
                $('#aoldimg').val(data.image);
                $('#aimage').removeAttr('required');

                $('#aname').attr("placeholder", "");
                $('#aname').val(data.name);
                $('#aseller').attr("placeholder", "");
                $('#aseller').val(data.seller);
                $('#aprice').attr("placeholder", "");
                $('#aprice').val(data.price);

                $('#optbrand').html(data.brand);
                $('#abrand').val(data.brand);
                $('#optcategory').html(data.category);
                $('#acategory').val(data.category);

                $('#oldimage').attr("src", "../public/img/" + data.image);
                $('#oldimage').attr("class", "img-thumbnail shadow mt-1 mb-4 d-block");

                $('.modal-body form').attr('action', 'http://localhost/phplearn/phpmvc/public/products/edit');
            }
        });
    });
})