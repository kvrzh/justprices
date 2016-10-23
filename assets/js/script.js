$(document).ready(function () {

    resizeSearch();
    setTimeout(function () {
        setPadding()
    }, 500);
    $(window).resize(function () {
        setPadding();
        resizeSearch();
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