function refresh_prices() {
    let sumPrice = 0;
    $('[id^=quantity_]').each(function ( index ) {
        let id = $(this).attr('id').split('_').pop();

        let quantity = $(this).val();
        let price = $('#price_' + id).html();
        let summary = parseInt(price) * parseInt(quantity);
        sumPrice += summary;

        $('#sum_price_' + id).html(summary);
        $('#total').val(sumPrice);
    });
}

$(document).ready(function () {
    $(document).on("change paste keyup", "[id^=quantity_]", function () {
        refresh_prices();
    });

    refresh_prices();
});
