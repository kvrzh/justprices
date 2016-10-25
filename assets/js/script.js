$(document).ready(function () {
    $(".sales-list").mCustomScrollbar({
        theme: "dark"
    });
    showMenu();
    resizeSearch();
    loadSale();
    setTimeout(function () {
        setPadding()
    }, 200);

    $(window).resize(function () {
        setPadding();
        resizeSearch();
        resizeSales();
    });

});
function setPadding() {
    var divListItem = $('div.sales-list-item').height();
    var img = $('div.sales-list-item img').outerHeight(true);
    var padding = (divListItem - img) / 2;
    $('div.sales-list-item img').css('padding-top', padding);
}
function helpResizeSearch() {
    $(".search input[type = 'search']")
        .focus(function () {
            $(this).parent().addClass('active');
        })
        .focusout(function () {
            if ($(window).width() >= '1200') {
                $(this).parent().removeClass('active');
            }
        });
}
function resizeSearch() {
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
function loadSale(){
    $('.sales-list-item button').click(function(){
        var id = $(this).parent().find('input[name = "sales_id"]').attr('value');
        var url = 'sales/sale/'+id;
        $('.sales-list').html('<div class="sale_item_details"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>');
        $('div.sale_item_details').load(url);
    })
}