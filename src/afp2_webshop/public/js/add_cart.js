function add_to_cart(link) {
    $.get(link, function (data, status) {
        let count = parseInt($('#user_cart_count').text());
        $('#user_cart_count').text(count + 1);
    });
}
