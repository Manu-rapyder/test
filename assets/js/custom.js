function cookiesPolicyPrompt() {
    if (Cookies.get('acceptedCookiesPolicy') !== "yes") {
        //console.log('accepted policy', chk);
        $("#alertCookiePolicy").show();
    }
    $('#btnAcceptCookiePolicy').on('click', function () {
        //console.log('btn: accept');
        Cookies.set('acceptedCookiesPolicy', 'yes', {
            expires: 30
        });
    });
    $('#btnDeclineCookiePolicy').on('click', function () {
        //console.log('btn: decline');
        document.location.href = "#";
    });
}

$(document).ready(function () {
    cookiesPolicyPrompt();

    //-- following not for production ------
    $('#btnResetCookiePolicy').on('click', function () {
        console.log('btn: reset');
        Cookies.remove('acceptedCookiesPolicy');
        $("#alertCookiePolicy").show();
    });
    // ---------------------------
});

// Toogle
$('#toggle').click(function () {
    $(this).toggleClass('active');
    $('#overlay').toggleClass('open');
});

// Panel (Menu hamburger)
$(document).ready(function () {
    $("#flip").click(function () {
        $("#panel").slideToggle("slow");
    });
});