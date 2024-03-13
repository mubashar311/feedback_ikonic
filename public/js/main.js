$(".show-append").click(function () {
    $(".right-navItems").show();
    $(".modal-body").append($(".right-navItems"));
});
$(".back-append").click(function () {
    $(".append-back").append($(".right-navItems"));
});
jQuery(document).ready(function ($) {
    $(".accordion-body.p-0 a.nav-link").on("click", function () {
        $(".accordion-body.p-0 a.nav-link").removeClass("nav_Link_Active");
        $(this).addClass("nav_Link_Active");
    });
    $("button.accordion-button.collapsed").on("click", function () {
        $(".accordion-body.p-0 a.nav-link").removeClass("nav_Link_Active");
    });

    $("i.fa.fa-bars").on("click", function () {
        $(".custom-sidebar").fadeIn("slow");
    });
    $(".close-sidebar").on("click", function () {
        $(".custom-sidebar").fadeOut("slow");
    });


    $("li.nav-item.navParent").on("click", function () {
        $(this).addClass("nav_Link_Active");
        $(".accordion-body.p-0 a.nav-link").removeClass("nav_Link_Active");
    });
    $("button.accordion-button.collapsed").on("click", function () {
        $("li.nav-item.navParent").removeClass("navParentActive");
    });

    $("a.nav-link.nav-sidebar-items").on("click", function () {
        $("a.nav-link.nav-sidebar-items").removeClass("nav_Link_Active");
        $(this).addClass("nav_Link_Active");
    });
    $("button.accordion-button.collapsed").on("click", function () {
        $("a.nav-link.nav-sidebar-items").removeClass("nav_Link_Active");
    });
    $(".accordion-body.p-0 a.nav-link").on("click", function () {
        $("a.nav-link.nav-sidebar-items").removeClass("nav_Link_Active");
        $(".navParent").removeClass("nav_Link_Active");
    });
    $("a.nav-link.nav-sidebar-items").on("click", function () {
        $(".accordion-body.p-0 a.nav-link").removeClass("nav_Link_Active");
    });

    $('body').on('click','.clear-filters', function () {
        const formId = '#'+$(this).attr('form-id');
        $('.filter-input').val('');
        $(formId).submit();
    });
    $('body').on('click','.clear-filters', function () {
        const formId = '#'+$(this).attr('table-id');
        $('.filter-input').val('');
        $(formId).submit();
    });
});

document.onreadystatechange = function () {
    let lastScrollPosition = 0;
    const navbar = document.querySelector(".nav-scroll");
    window.addEventListener("scroll", function (e) {
        lastScrollPosition = window.scrollY;

        if (lastScrollPosition > 40) navbar.classList.add("navbar-dark");
        else navbar.classList.remove("navbar-dark");
    });
};

