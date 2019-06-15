$(document).ready(function() {

    // on click sign up, hide login
    $(".signup").click(function() {
        $(".form_login").slideUp("slow", function() {
            $(".form_register").slideDown("slow");
        });
    });
    // on click sign up, hide register

    $(".signin").click(function() {
        $(".form_register").slideUp("slow", function() {
            $(".form_login").slideDown("slow");
        });
    });

}) ;