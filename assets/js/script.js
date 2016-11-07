$(document).ready(function () {
    $(".sales-list").mCustomScrollbar({
        theme: "dark",
        timeout: 0,
        scrollInertia: 200
    });
    window.addEventListener("popstate", function (e) {
        e.preventDefault;
        window.location.reload();
    }, false);

    showMenu();
    var elem = $('.sale_item_details i');
    filterBySearch();
    search();

    resizeSearch();
    loadSale();
    $('.filter>span').click(function () {
        resetFilter();
    });
    $(window).resize(function () {
        resizeSearch();
        resizeSales();
    });
    filter();

});
function helpResizeSearch() {
    $(".search input[type = 'search']")
        .focus(function () {
            $(this).parent().addClass('active');
            $('div#search_advice_wrapper').css('width','100%');
        })
        .focusout(function () {
            if ($(window).width() >= '1200') {
                $(this).parent().removeClass('active');
                $('div#search_advice_wrapper').css('width','80%');
            }
        });
}
function resizeSearch() {
    $(".search input[type = 'search']").focusout(function () {
        $('div.advice_variant').fadeOut(300);
    });
    if ($(window).width() >= '1200') {
        $('.search form').removeClass('active');
        helpResizeSearch();
    } else {
        $('.search form').addClass('active');
    }
}
function showMenu() {
    var width = $(window).width();
    $('header .menu-search i').click(function () {
        var menu = $('div.sales .filter');
        var content = $('div.sales .sales-list');
        if ($(menu).hasClass('active')) {
            $(menu).removeClass('active');
            addAll(menu);
            if (width < 1200 && $(content).hasClass('col-md-8')) {
                $(content).removeClass('col-md-8').addClass('col-md-12');
            }
            setTimeout(function () {
                $(content).css('float', 'left');
            }, 500);
        } else {
            if (width > '992') {
                $(menu).addClass('active');
                $(content).css('float', 'right');
                $(menu).addClass('col-md-4');
                $(content).addClass('col-md-8').removeClass('col-md-12');
                setTimeout(function () {
                    removeAll(menu)
                }, 500);
            } else if (width <= '992') {
                $(menu).addClass('active');
                $(menu).addClass('mob');
                $(menu).addClass('col-sm-4');
                removeAll(menu);
                $(menu).fadeTo(500, 1);
            }
        }

        $(menu).addClass('')
    });
}
function removeAll(item) {
    $(item).removeClass('hidden-md');
    $(item).removeClass('hidden-sm');
    $(item).removeClass('hidden-xs');
}
function addAll(item) {
    $(item).addClass('filter');
    $(item).addClass('hidden-md');
    $(item).addClass('hidden-sm');
    $(item).addClass('hidden-xs');
    $(item).addClass('col-lg-2');
}
function resizeSales() {
    var width = $(window).width();
    if (width >= 1200) {
        if ($('div.sales-list').css('float') == 'right') {
            $('div.sales-list').css('float', 'left');
        }
        if ($('div.filter').hasClass('mob')) {
            $('div.filter').removeClass('mob');
        }
    } else {
        if ($('div.sales-list').hasClass('col-md-8')) {
            $('div.filter').removeClass('col-md-8').addClass('col-md-12');
        }
    }
}
function loadSale() {
    $('.sales-list-item button').click(function () {
        var id = $(this).parent().find('input[name = "sales_id"]').attr('value');
        var url = '/sales/sale/' + id;
        if (url != window.location) {
            window.history.pushState(null, null, url);
        }
        $('.sales-list').html('<div class="sale_spin"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>');
        $('div.sales-list').load(url, {js: 'true'}, function () {
            $(".sale_item_details").mCustomScrollbar({
                theme: "dark",
                timeout: 0,
                scrollInertia: 200
            });
            $('.sales-list').mCustomScrollbar("destroy");
        });
    })
}

function loadSaleList() {
    $('.sale_item_details i').click(function () {
        var url = '/sales';
        if (url != window.location) {
            window.history.pushState(null, null, url);
        }
        $('.sales-list').html('<div class="sale_spin"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>');
        $('div.sales-list').load(url, {js: 'true'}, function () {
            $(".sales-list-load").css({
                'max-height': 'calc(100vh - 70px)'
            });
            $(".sales-list-load").mCustomScrollbar({
                theme: "dark",
                timeout: 0,
                scrollInertia: 200
            });
            $('.sales-list').mCustomScrollbar("destroy");
        });
    });
}

function filter() {
    var menu = $('div.sales .filter');
    var content = $('div.sales .sales-list');
    $('.filter button').click(function () {
        $('#search').val('');
        city = filterSmth('city');
        category = filterSmth('category');
        this_url = window.location.pathname.split('/');
        if (this_url[3] !== undefined) {
            var shop = {
                name: 'shop',
                value: this_url[3]
            };
        } else {
            var shop = {
                name: 'shop',
                value: 0
            };
        }

        var url = '/sales';
        if (url != window.location) {
            window.history.pushState(null, null, url);
        }
        $('.sales-list').html('<div class="sale_spin"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>');
        $('div.sales-list').load(url, {js: true, 'result': [city, category, shop]}, function () {
            $(".sales-list-load").css({
                'max-height': 'calc(100vh - 70px)'
            });
            $(".sales-list-load").mCustomScrollbar({
                theme: "dark",
                timeout: 0,
                scrollInertia: 200
            });
            $('.sales-list').mCustomScrollbar("destroy");
        });
        if ($(menu).hasClass('active')) {
            $(menu).removeClass('active');
            addAll(menu);
            if (width < 1200 && $(content).hasClass('col-md-8')) {
                $(content).removeClass('col-md-8').addClass('col-md-12');
            }
            setTimeout(function () {
                $(content).css('float', 'left');
            }, 500);
        }
    });
}
function filterSmth(filter) {
    var elem = $('.filter select[name = ' + filter + '] option:selected');
    var optionId = $(elem).val();
    var result = {
        'name': filter + '_id',
        'value': optionId
    };
    return result;
}
function resetFilter() {
    var val = 0;
    $('.filter select option[value="' + val + '"]').prop('selected', true);
    if ($("#search").val().length > 0) {
        $("#search").val('');
    }
    $('.search input.submit').click();
}
function search() {
    $("#search")
        .focus(function () {
        if($(this).val().length>1){
            $.get('/sales/search', {'query': $(this).val()}, function (data) {
                data = eval('('+data+')');//json data. array of strings
                if(data.length!=undefined && data.length>0){
                    $("#search_advice_wrapper").html('');
                    for(i in data){
                        $("#search_advice_wrapper").append('<div class="advice_variant">'+data[i]+'</div>');
                    }
                }
            });
        }
    });
    $("#search").keyup(function () {
        if($(this).val().length>1){
            $.get('/sales/search', {'query': $(this).val()}, function (data) {
                data = eval('('+data+')');//json data. array of strings
                if(data.length!=undefined && data.length>0){
                    $("#search_advice_wrapper").html('');
                    for(i in data){
                        $("#search_advice_wrapper").append('<div class="advice_variant">'+data[i]+'</div>');
                    }
                    searchChoise();
                }
            });
        }else if($(this).val().length== 0){
            $('div.advice_variant').fadeOut(300);
            $('div.advice_variant').remove();
        }
    });

}
function searchChoise() {
    $("#search_advice_wrapper div").click(function () {
        if ($(this).text() != "Извините, нет совпадений") {
            $('#search').val($(this).text());
            $('.search input.submit').click();
        }
    });
}
function filterBySearch() {
    $("#formsearch").submit(function (e) {
        return false;
    });
    $('#formsearch').submit(function (event) {
        event.preventDefault;
        var city = filterSmth('city');
        var category = filterSmth('category');
        var url = '/sales';
        var shop = {
            name: 'shop',
            value: $('#search').val()
        };
        if (url != window.location) {
            window.history.pushState(null, null, (url + '/index/' + shop['value']).replace(/ /g, '_'));
        }
        $('.sales-list').html('<div class="sale_spin"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>');
        $('div.sales-list').load(url, {js: 'true', 'result': [city, category, shop]}, function () {
            $(".sales-list-load").css({
                'max-height': 'calc(100vh - 70px)'
            });
            $(".sales-list-load").mCustomScrollbar({
                theme: "dark",
                timeout: 0,
                scrollInertia: 200
            });
            setPadding();
            $('.sales-list').mCustomScrollbar("destroy");
        });
    });
}