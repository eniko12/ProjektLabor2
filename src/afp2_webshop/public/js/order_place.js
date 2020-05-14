function make_billing_required() {
    let diff_billing = $('#diff_billing').is(":checked");

    let b_country = $("#b_country");
    b_country.prop('required',diff_billing);
    $("label[for='"+b_country.attr('id')+"']").text("Country" + (diff_billing ? "*" : ""));

    let b_postal_code = $("#b_postal_code");
    b_postal_code.prop('required',diff_billing);
    $("label[for='"+b_postal_code.attr('id')+"']").text("Postal code" + (diff_billing ? "*" : ""));

    let b_city = $("#b_city");
    b_city.prop('required',diff_billing);
    $("label[for='"+b_city.attr('id')+"']").text("City" + (diff_billing ? "*" : ""));

    let b_street = $("#b_street");
    b_street.prop('required',diff_billing);
    $("label[for='"+b_street.attr('id')+"']").text("Street" + (diff_billing ? "*" : ""));

    let b_house = $("#b_house");
    b_house.prop('required',diff_billing);
    $("label[for='"+b_house.attr('id')+"']").text("House" + (diff_billing ? "*" : ""));
}

$( document ).ready(function() {
    make_billing_required();

    $('#diff_billing').change(function() {
        make_billing_required();
    });
});
