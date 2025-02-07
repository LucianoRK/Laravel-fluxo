<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{config('app.name')}} - @yield('title')</title>

    <!-- ================== GOOGLE FONTS ==================-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">

    <!-- ======================= GLOBAL VENDOR STYLES ========================-->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/metismenu/dist/metisMenu.css')}}">   

    <!-- ======================= LINE AWESOME ICONS ===========================-->
    <link rel="stylesheet" href="{{asset('assets/css/icons/line-awesome.min.css')}}">

    <!-- ======================= DRIP ICONS ===================================-->
    <link rel="stylesheet" href="{{asset('assets/css/icons/dripicons.min.css')}}">

    <!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
    <link rel="stylesheet" href="{{asset('assets/css/icons/material-design-iconic-font.min.css')}}">

    <!-- ======================= PAGE LEVEL VENDOR STYLES ========================-->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">

    <!-- ======================= GLOBAL COMMON STYLES ============================-->
    <link rel="stylesheet" href="{{asset('assets/css/common/main.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-daterangepicker/daterangepicker.css')}}">

    <!-- ======================= LAYOUT TYPE ===========================-->
    <link rel="stylesheet" href="{{asset('assets/css/layouts/vertical/core/main.css')}}">

    <!-- ======================= MENU TYPE ===========================-->
    <link rel="stylesheet" href="{{asset('assets/css/layouts/vertical/menu-type/content.css')}}">

    <!-- ======================= THEME COLOR STYLES ===========================-->
    <link rel="stylesheet" href="{{asset('assets/css/layouts/vertical/themes/theme-i.css')}}">

    <!-- ================== GLOBAL APP SCRIPTS ==================-->
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/myMasks.js')}}"></script>

    <!-- ================== FORMATO DE DINHEIRO NO INPUT ==================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
</head>
