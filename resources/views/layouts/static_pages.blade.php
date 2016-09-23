<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>

    <!-- ==== Favicon  === -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- ==== Stylesheets  === -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/js/jquery.bxSlider/jquery.bxslider.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,800' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/css/owl.theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/css/owl.transitions.css')}}">
    <script type="text/javascript" src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/assets/css/style.css')}}">
    <!-- /// Plugins CSS ////////  -->
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('frontend/assets/vendors/revolutionslider/css/settings.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('frontend/assets/vendors/revolutionslider/css/layers.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('frontend/assets/vendors/revolutionslider/css/navigation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('frontend/assets/vendors/bxslider/jquery.bxslider.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('frontend/assets/vendors/magnificpopup/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/assets/vendors/animations/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/assets/vendors/itplayer/css/YTPlayer.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/assets/css/layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/assets/css/components.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/css/style.css')}}"/>

    <style type="text/css">
        .my-overlay {
            background: RGBA(255, 255, 255, 0.6);
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>

</head>
<body id="app-layout">

@include('frontendviews.includes.header')
@yield('content')
@include('frontendviews.includes.footer')

<script src="{{URL::asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- /// ViewPort ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/viewport/jquery.viewport.js')}}"></script>

<!-- /// Easing ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/easing/jquery.easing.1.3.js')}}"></script>

<!-- /// SimplePlaceholder ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/simpleplaceholder/jquery.simpleplaceholder.js')}}"></script>

<!-- /// Fitvids ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/fitvids/jquery.fitvids.js')}}"></script>

<!-- /// Animations ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/animations/animate.js')}}"></script>

<!-- /// Superfish Menu ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/superfish/hoverIntent.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/superfish/superfish.js')}}"></script>

<!-- /// Revolution Slider ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/revolutionslider/js/extensions/revolution.extension.video.min.js')}}"></script>

<!-- /// bxSlider ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/bxslider/jquery.bxslider.min.js')}}"></script>

<!-- /// Magnific Popup ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/magnificpopup/jquery.magnific-popup.min.js')}}"></script>

<!-- /// Isotope ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/isotope/isotope.pkgd.min.js')}}"></script>

<!-- /// Parallax ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/parallax/jquery.parallax.min.js')}}"></script>

<!-- /// EasyPieChart ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/easypiechart/jquery.easypiechart.min.js')}}"></script>

<!-- /// YTPlayer ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/itplayer/jquery.mb.YTPlayer.js')}}"></script>

<!-- /// Easy Tabs ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/easytabs/jquery.easytabs.min.js')}}"></script>

<!-- /// Form validate ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/jqueryvalidate/jquery.validate.min.js')}}"></script>

<!-- /// Form submit ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/jqueryform/jquery.form.min.js')}}"></script>

<!-- /// gMap ////////  -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{URL::asset('frontend/assets/vendors/gmap/jquery.gmap.min.js')}}"></script>

<!-- /// Twitter ////////  -->
<script src="{{URL::asset('frontend/assets/vendors/twitter/twitterfetcher.js')}}"></script>

<!-- /// Custom JS ////////  -->
<script src="{{URL::asset('frontend/assets/js/main.js')}}"></script>


<script src="{{URL::asset('frontend/assets/vendors/switcher/jquery_cookie.js')}}"></script>
<script src="{{URL::asset('frontend/assets/vendors/switcher/switcher.js')}}"></script>
<script src="{{URL::asset('frontend/js/main.js')}}"></script>
</body>
</html>