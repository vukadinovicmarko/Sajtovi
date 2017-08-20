$(document).ready(function() {
    $(".nav .dropdown").hover(function() {
        $(this).find(".dropdown-toggle").dropdown("toggle");
    });
    $(".show_registration").click(function () {
        $(".login_div").slideUp(500, function () {
            $(".reg_div_okvir").slideDown(500);
        });
    });
    $(".show_login").click(function () {
        $(".reg_div_okvir").slideUp(500, function () {
            $(".login_div").slideDown(500);
        });
    });
    $(".error").prev().css({border:'1px solid red'});
    $(".showAdd").click(function(){
        $(".hiddenDiv").slideToggle();
    });
});