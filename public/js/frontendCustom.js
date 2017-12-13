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
    $(".ar").geocomplete({details: "form"});
    $('.rateit').rateit();
    $('.refer').on('click', function (e) {
        var jump = $(this).attr('href');

        var new_position = $(jump).offset();

        $('html, body').stop().animate({scrollTop: new_position.top}, 1000);
        e.preventDefault();

    });
    $('.menu-food-category-list').floatit();
    $('.my-order').floatit();
    $('.food-category-list').floatit();


    $('.items-add').on('click', function (e) {
        e.preventDefault();
//        var itemName = $(this).siblings(':first').text();
//        var itemPrice = $(this).prev().text();
        var urlsrch = $(this).attr('href');

        $.ajax({
            url: urlsrch,
            dataType: 'json',
            type: 'get',
//            data: {
//                name: itemName,
//                price: itemPrice
//            },
            success: function (items) {
                $(".basket p").html('');
                $(".basket i").hide();
                $.each(items, function (i, item) {
                    $(".basket p").append('<div class="handle-counter" id="handleCounter">\n\
<button class="counter-minus btn btn-primary">-</button> <input type="text" value="3"><button class="counter-plus btn btn-primary">+</button>' + item.name + item.price + '<br>');
                });
            }
        });
    });
    $('#handleCounter').handleCounter({
        minimum: 1,
        maximize: null
    });

});




