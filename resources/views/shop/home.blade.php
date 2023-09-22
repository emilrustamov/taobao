@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}

@php
$dbh = new PDO('mysql:dbname=shops;host=localhost', 'root', '');

// Получение записей для первой страницы
$sth = $dbh->prepare("SELECT * FROM `product_view` LIMIT 4");
$sth->execute();
$items = $sth->fetchAll(PDO::FETCH_ASSOC);


$sth1 = $dbh->prepare("SELECT * FROM `product_view`");
$sth1->execute();
$items1 = $sth1->fetchAll(PDO::FETCH_ASSOC);

// Кол-во страниц
$sth = $dbh->prepare("SELECT COUNT(`id`) FROM `product`");
$sth->execute();
$total = $sth->fetch(PDO::FETCH_COLUMN);

$amt = ceil($total / 4);
@endphp


@section('content')

@php
$instaposts = [['comment' => 'Топ магаз, вещи как будто из Америки', 'img' => '/review-boy.svg'], ['comment' => 'Хлопок лучше, чем Алтын Асыр', 'img' => '/review-boy.svg'], ['comment' => 'Я хоть и негр, но люблю стильно одеваться и этот магазин меня спасает', 'img' => '/review-boy.svg']];
@endphp


<div class="wrapper my-3">
    <div class="row text-center advantages">
        <div class="col-4"><span class="tf-icons icon-orange bx bx-check"></span>Дешевые цены</div>
        <div class="col-4"><span class="tf-icons icon-orange bx bx-dollar"></span>Возврат товара</div>
        <div class="col-4"><span class="tf-icons icon-orange bx bx-support"></span>Доставка до 7 дней</div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 my-3">
            <div class="category-block row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 bg-banner">
                    <img src="{{ asset('assets/img/banners/mans-wear.svg') }}" alt="man wear banner" />
                    <button type="button" class="btn main-banner-btn  rounded-pill btn-primary">Мужчинам</button>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6 bg-banner">
                    <img src="{{ asset('assets/img/banners/mans-wear.svg') }}" alt="man wear banner" />
                    <button type="button" class="btn main-banner-btn  rounded-pill btn-primary">Женщинам</button>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bg-banner">
                    <img src="{{ asset('assets/img/banners/mans-wear.svg') }}" alt="man wear banner" />
                    <button type="button" class="btn main-banner-btn  rounded-pill btn-primary">Техника </button>
                </div>
            </div>
            <div class="top-sale my-3">
                <h2 class="my-3">Топ продаж</h2>
                <section class="regular slider">
                    @foreach ($items1 as $row)
                    <div class="top-item item p-3">
                    <img src="assets/<?php echo $row['img']; ?>" alt="" class="img-fluid">
                        <div class="d-flex justify-content-between">
                            <div class="product-title">{{ $row['product_name'] }}</div>
                            <div class="product-price">{{ $row['price']."TMT" }}</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="product-category">{{ $row['category_name'] }}</div>
                            <div class="product-sale">30%</div>
                        </div>
                    </div>
                    @endforeach
                </section>
            </div>

            <div id="showmore-list">
                <div class="prod-list row">
                    @foreach ($items as $row)
                    <div class="col-lg-3 col-xs-6 col-6">
                        <img src="assets/<?php echo $row['img']; ?>" alt="" class="img-fluid">
                        <div class="d-flex justify-content-between">
                            <div class="product-title">{{ $row['product_name'] }}</div>
                            <div class="product-price">{{ $row['price']."TMT" }}</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="product-category">{{ $row['category_name'] }}</div>
                            <div class="product-sale">30%</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="showmore-bottom">
                <a data-page="1" data-max="<?php echo $amt; ?>" id="showmore-button" href="#">Показать еще</a>
            </div>

            <script>
                $(function() {
                    console.log("1");
                    $('#showmore-button').click(function() {
                        var $target = $(this);
                        var page = $target.attr('data-page');
                        page++;
                        console.log("2");

                        $.ajax({
                            url: 'ajax.php?page=' + page,
                            dataType: 'html',

                            success: function(data) {
                                console.log("3"),
                                    $('#showmore-list .prod-list').append(data);
                            }
                        });

                        $target.attr('data-page', page);
                        if (page == $target.attr('data-max')) {
                            $target.hide();
                        }

                        return false;
                    });
                });
            </script>

        </div>


        <div class="col-lg-3 col-md-3 col-sm-12  my-3">
            <div class="test">
                <div class="col-12 pets-block d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('assets/img/banners/pet.svg') }}" alt="bg-img" />
                    <p>Привет!</p>
                    <div class="col-12 d-flex justify-content-center"><span class="tf-icons icon-orange bx bx-dollar"></span>
                        <p>Накорми меня</p>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn orange-btn">Накормить</button>
                        </div>
                        <div class="col-6 ">
                            <button type="button" class="btn btn-outline-primary d-flex align-items-center">
                                {{-- <span class="tf-icons bx bx-pie-chart-alt me-1"></span> --}}
                                <span class="fs-6">Подробнее</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12  partners-container d-flex flex-column justify-content-between p-3 mt-3">
                    <h2>Станьте партнером<br>нашего сайта!</h2>
                    <p>Зарабатывайте деньги не выходя из дома</p>
                    <button type="button" class="btn rounded-pill red-btn">Подробнее</button>
                </div>
                <div class="col-12 reviews-inst p-3 mt-sm-3 mt-3">
                    <h2>Отзывы с Insta</h2>
                    <div class="instaposts slider">
                        @foreach ($instaposts as $instapost)
                        <div class="item">
                            <div class="col-lg-12"><img src="{{ asset('assets/img/banners/' . $instapost['img']) }}" alt="bg-img" />
                            </div>
                            <div class="col-lg-12 text-center"> {{ $instapost['comment'] }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection