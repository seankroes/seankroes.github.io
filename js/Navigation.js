$(document).ready(function () {

    $('.nav-link').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        $('.page').hide();
        var clickedId = $(this).data('id');
        $('#page' + clickedId).show();

        //localStorage.setItem("currentPage", clickedId);
    });

    $('.nav-link-header').click(function () {
        $( ".nav-link:nth-child(1)" ).addClass('active').siblings().removeClass('active');
        $('.page').hide();
        var clickedId = $(this).data('id');
        $('#page' + clickedId).show();

        //localStorage.setItem("currentPage", clickedId);
    });

});