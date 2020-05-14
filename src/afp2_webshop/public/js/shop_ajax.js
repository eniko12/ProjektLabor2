$(document).ready(function () {
    let s = $('#rq_main_search').val();
    if(s){
        $('#quick_search').val(s);
    }
    ajax_init();
    ajax_refresh()
});

function ajax_init(){
    $(document).on("change paste keyup", "#quick_search, #search_author, #search_genre, #price_min, #price_max, #search_publisher, #page_min, #page_max", function () {
        ajax_refresh();
    });

    $('input[type=radio][name=language_radio]').change(function() {
        ajax_refresh();
    });
}

function ajax_refresh(to_page = 0) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let qs_value = $('#quick_search').val();
    let pushData = {
        quick_search: qs_value,
        author_search: $('#search_author').val(),
        genre_search: $('#search_genre').val(),
        price_min: $('#price_min').val(),
        price_max: $('#price_max').val(),
        language: $('input[name="language_radio"]:checked').val(),
        publisher_search: $('#search_publisher').val(),
        page_min: $('#page_min').val(),
        page_max: $('#page_max').val(),
        toPage: to_page
    };

    $.ajax({
        type:'POST',
        url:'/shop',
        data: pushData, //
        success:function(data){
            $('#ajax_target').html(data);
            history.replaceState(pushData, "Search - " + qs_value + " - XYZ Bookshop", "/shop/search/"+qs_value)
        },
        fail: function(xhr, textStatus, errorThrown){
            alert('request failed');
        }
    }).fail(function (msg) {
        $('#ajax_target').html(msg.responseText);
    });
}
