$('.add-to-cart').on('click', function() {
    $.get("site/add-to-cart",{id: $(this).attr("id")},function(data) {
        $(".col-products-in-cart").html(data);
    });
});
