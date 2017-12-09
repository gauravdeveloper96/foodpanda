$(document).ready(function () {
    $('#areaSearch').on('keyup', function () {
        var keyword = $(this).val();
        var searchUrl = $(this).data('url');
        if (keyword.length) {
            $.ajax({
                url: searchUrl,
                dataType: 'json',
                type: 'get',
                data: {
                    restaurantName: keyword
                },
                success: function (response) {
                    $('#searchResults').html('');
                    var restaurantUrl = $('#searchResults').data('url');
                    $.each(response, function (i, v) {
                        $('#searchResults').append('<li><a href="' + restaurantUrl + '/' + v.id + '">' + v.name + '</a></li>');
                    });

                }
            });
        } else {
            $('#searchResults').html('');
        }
    });
    $('select[name="size"]').change(function () {
        if ($(this).val() == "restaurant") {
            $('.srch-area').hide();
            $('.srch-restro').show();
            $('.rest').prop('disabled', false);

        }
        if ($(this).val() == "city") {
            $('.srch-area').show();
            $('.srch-restro').hide();
            $('.ar').prop('disabled', false);
            $('.lat').prop('disabled', false);
            $('.lng').prop('disabled', false);

        }

    });
    $(".ar").geocomplete({ details: "form" });
    

});


