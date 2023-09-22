<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title')</title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- Include Styles -->
  @include('layouts/sections/styles')

  <!-- Include Scripts for customizer, helper, analytics, config -->
  @include('layouts/sections/scriptsIncludes')
</head>



@section('content')
@php
$menuLinks = [
[
'title' => 'Главная',
'iconSrc' => '/home-icon.svg',
'link' => '/',
],
[
'title' => 'Мужчинам',
'iconSrc' => '/4man-icon.svg',
'link' => '/onecategory',
],
[
'title' => 'Женщинам',
'iconSrc' => '/4girls-icon.svg',
'link' => '/onecategory',
],
[
'title' => 'Техника',
'iconSrc' => '/tehnics-icon.svg',
'link' => '/onecategory',
],
[
'title' => 'Скидки',
'iconSrc' => '/sales-icon.svg',
'link' => '/onecategory',
],
[
'title' => 'Заявка',
'iconSrc' => '/request-icon.svg',
'link' => '/application',
],
[
'title' => 'Контакты',
'iconSrc' => '/contacts-icon.svg',
'link' => '/onecategory',
],
];
@endphp


<body>
  <div class="row h-100">
    <!-- <div class="col-lg-1 col-2 aside-menu p-0"> -->
    <div id="mob-side-menu" class="d-none">
      <span id="mob-side-menu-close">X</span>
      <ul class="pt-3 p-0 menu-links">
        @foreach ($menuLinks as $menuLink)
        <li><a href="{{ $menuLink['link'] }}">
            <div>
              <img src="{{ asset('assets/img/icons/menu/' . $menuLink['iconSrc']) }}">
            </div>
            <div>
              {{ $menuLink['title'] }}
            </div>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="col-sm-1 col-lg-1 col-2 aside-menu" id="aside-menu">
      <div class="aside-menu d-none" id="aside-sub" style="position:absolute; ">
        <ul class="pt-3 p-0 menu-links">
          @foreach ($menuLinks as $menuLink)
          <li><a href="{{ $menuLink['link'] }}">
              <div>
                <img src="{{ asset('assets/img/icons/menu/' . $menuLink['iconSrc']) }}">
              </div>
              <div class="d-none d-xl-block">
                {{ $menuLink['title'] }}
              </div>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
      <ul class="pt-3 p-0 menu-links">
        @foreach ($menuLinks as $menuLink)
        <li><a href="{{ $menuLink['link'] }}">
            <div class="nav_link">
              <img src="{{ asset('assets/img/icons/menu/' . $menuLink['iconSrc']) }}">
            </div>
            <div class="d-none d-xl-block">
              {{ $menuLink['title'] }}
            </div>
          </a>
        </li>
        @endforeach
      </ul>

    </div>
    <div class="col-sm-11 col-lg-11 col-12 ">
      @include('layouts/sections/header/header')
      <!-- Layout Content -->
      @yield('content')
      <!--/ Layout Content -->
      @include('layouts/sections/footer/footer')
    </div>

  </div>
  <!-- Include Scripts -->
  @include('layouts/sections/scripts')
</body>

</html>