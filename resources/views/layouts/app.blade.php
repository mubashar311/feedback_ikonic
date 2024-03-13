<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweatAlert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-color.png')}}">
</head>
<style>
</style>

<body class="scroll_style_bd">
    <div id="loader">
        <div class="loaderImg">
            <img src="{{ asset('images/logo-color.png') }}" alt="">
            <div class="loading">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
    </div>
    <div class="main">
        <!---SideBar Start Here-->
        @include('layouts.sidebar')
        <!---SideBar End Here-->
        <!--Main Content Start Here-->
        <div id="content">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <!---Header---->
                        @include('layouts.header')
                        <!----Header End Here------>
                    </div>
                </div>
                <!---Content Starts Here --->
                @yield('content')
                <!---Content Ends Here --->
            </div>
        </div>
        <!--Main Content Ends Here-->
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/apexchart.js')}}"></script>
    <script src="{{ asset('js/sweatAlert2.min.js')}}"></script>
    <script src="{{ asset('js/paging.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>


    <script type="text/javascript">
        AOS.init({
            disable: 'mobile',
        });
        AOS.refresh();
        $(document).ready(function() {
            $('.menu-toggle').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
            $('.times').on('click', function() {
                $('#sidebar').removeClass('active');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Show the loader initially

            // Load your data or perform any asynchronous operations
            $(window).on('load', function() {
                $('#loader').fadeOut('slow');
            });
            // After the data has finished loading, hide the loader
            $('#loader').fadeOut('slow');
        });


        function test() {
  var tabsNewAnim = $("#navbarSupportedContent");
  var selectorNewAnim = $("#navbarSupportedContent").find("li").length;
  var activeItemNewAnim = tabsNewAnim.find(".active");
  var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
  var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
  var itemPosNewAnimTop = activeItemNewAnim.position();
  var itemPosNewAnimLeft = activeItemNewAnim.position();
  $(".hori-selector").css({
    top: itemPosNewAnimTop.top + "px",
    left: itemPosNewAnimLeft.left + "px",
    height: activeWidthNewAnimHeight + "px",
    width: activeWidthNewAnimWidth + "px"
  });
  $("#navbarSupportedContent").on("click", "li", function (e) {
    $("#navbarSupportedContent ul li").removeClass("active");
    $(this).addClass("active");
    var activeWidthNewAnimHeight = $(this).innerHeight();
    var activeWidthNewAnimWidth = $(this).innerWidth();
    var itemPosNewAnimTop = $(this).position();
    var itemPosNewAnimLeft = $(this).position();
    $(".hori-selector").css({
      top: itemPosNewAnimTop.top + "px",
      left: itemPosNewAnimLeft.left + "px",
      height: activeWidthNewAnimHeight + "px",
      width: activeWidthNewAnimWidth + "px"
    });
  });
}
$(document).ready(function () {
  setTimeout(function () {
    test();
  });
});
$(window).on("resize", function () {
  setTimeout(function () {
    test();
  }, 500);
});
$(".navbar-toggler").click(function () {
  $(".navbar-collapse").slideToggle(300);
  setTimeout(function () {
    test();
  });
});

// --------------add active class-on another-page move----------
jQuery(document).ready(function ($) {
  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();

  // Account for home page with empty path
  if (path == "") {
    path = "index.html";
  }

  var target = $('#navbarSupportedContent ul li a[href="' + path + '"]');
  // Add active class to target link
  target.parent().addClass("active");
});

// Add active class on another page linked
// ==========================================
$(window).on('load',function () {
    var current = location.pathname;
    console.log(current);
    $('#navbarSupportedContent ul li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.parent().addClass('active');
            $this.parents('.menu-submenu').addClass('show-dropdown');
            $this.parents('.menu-submenu').parent().addClass('active');
        }else{
            $this.parent().removeClass('active');
        }
    })
});
    </script>
    @yield('scripts')
</body>

</html>