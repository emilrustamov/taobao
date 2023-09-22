{{-- header --}}
<?php
$menuLinks = [
    [
        'title' => 'Главная',
        'iconSrc' => 'img/home-icon.svg',
    ],
    [
        'title' => 'Мужчинам',
        'iconSrc' => 'img/4man-icon.svg',
    ],
    [
        'title' => 'Женщинам',
        'iconSrc' => 'img/4girls-icon.svg',
    ],
    [
        'title' => 'Техника',
        'iconSrc' => 'img/tehnics-icon.svg',
    ],
    [
        'title' => 'Скидки',
        'iconSrc' => 'img/sales-icon.svg',
    ],
    [
        'title' => 'Заявка',
        'iconSrc' => 'img/request-icon.svg',
    ],
    [
        'title' => 'Контакты',
        'iconSrc' => 'img/contacts-icon.svg',
    ],
];
?>
<header>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="not-found-bar justify-content-around row orange-gradient">
                <h2 class="custom-vertical-align whc not-found-text col-lg-4 col-6 order-xl-1 order-2 text-center">
                    Не нашли то, что искали?
                </h2>
            </div>
        </div>
        <div class="col-lg-12 pink-gradient" id="header" style="padding: 0 3%;">
            <div class="row">
                <div class="header-menu d-sm-flex d-none flex-row gap-3 col-lg-4 col-xl-4">
                    <div class=" header-link custom-vertical-align">Партнерство
                    </div>
                    <div class=" header-link custom-vertical-align">
                        <a href="/login">Мобильное приложение</a>
                    </div>
                    <div class=" header-link custom-vertical-align">Помощь
                    </div>
                </div>
                <!-- searchbar begin -->
                <div class="search col-12 col-lg-4 col-xl-4">
                    <div id="search">
                        <svg viewBox="0 0 420 60" xmlns="http://www.w3.org/2000/svg">
                            <rect class="bar" />
                            <g class="magnifier">
                                <circle class="glass" />
                                <line class="handle" x1="32" y1="32" x2="44" y2="44"></line>
                            </g>
                            <g class="sparks">
                                <circle class="spark" />
                                <circle class="spark" />
                                <circle class="spark" />
                            </g>
                            <g class="burst pattern-one">
                                <circle class="particle circle" />
                                <path class="particle triangle" />
                                <circle class="particle circle" />
                                <path class="particle plus" />
                                <rect class="particle rect" />
                                <path class="particle triangle" />
                            </g>
                            <g class="burst pattern-two">
                                <path class="particle plus" />
                                <circle class="particle circle" />
                                <path class="particle triangle" />
                                <rect class="particle rect" />
                                <circle class="particle circle" />
                                <path class="particle plus" />
                            </g>
                            <g class="burst pattern-three">
                                <circle class="particle circle" />
                                <rect class="particle rect" />
                                <path class="particle plus" />
                                <path class="particle triangle" />
                                <rect class="particle rect" />
                                <path class="particle plus" />
                            </g>
                        </svg>
                        <input type=search name=q aria-label="Search for inspiration" />
                    </div>
                    <div id="results">
                    </div>
                </div>
                <div class="gap-3  d-sm-flex d-none flex-row col-lg-4 col-xl-4 justify-content-end">
                    <div class=" custom-vertical-align mobile_nav-item">
                        <a href="/login"><i class="fa fa-user-o"></i></a>
                    </div>
                    <div class=" custom-vertical-align mobile_nav-item">
                        <a><i class="fa fa-heart-o"></i></a>
                    </div>
                    <div class=" custom-vertical-align mobile_nav-item">
                        <a href="/order"><i class="fa fa-shopping-cart"></i>
                        <span class='badge badge-warning' id='lblCartCount'> 5 </span></a>
                    </div>
                </div>
                <!-- searchbar end -->

                <!-- header icons begin -->
                <!-- <div class="col-lg-4">
                    <div class="row">
                        <ul>
                            <li class="mobile_nav-item ">
                            </li>
                            <li class="mobile_nav-item ">
                            </li>
                            <li class="mobile_nav-item ">
                            </li>
                    </div>
                </div> -->
                <!-- header icons end -->
            </div>

        </div>
</header>

{{-- /header --}}