@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}





@section('content')

<div class="wrapper my-3">

    <div class="breadcrumb">Мужская одежда/рубашки

    </div>
    <div class="d-flex justify-content-between">
        <h1 class="category-title custom-vertical-align mb-2 ">Рубашки (500)
        </h1>
        <div class="d-flex">
            <div class="category-filter mx-2 custom-vertical-align" id="filter">Фильтр<i class="fa fa-filter"></i></div>
            <div class="category-sorting mx-2 custom-vertical-align">Сортировка<i class="fa fa-sort"></i></div>
        </div>
    </div>
    <div class="row">
        <div class="filter-menu col-lg-2 d-none  p-3">
            <div class="filter-subcategory border-bottom">
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
                <div>Обувь</div>
            </div>
            <div class="filter-gender border-bottom">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                <label for="vehicle1"> Мужчина</label><br>
                <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                <label for="vehicle2"> Женщина</label><br>
                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                <label for="vehicle3"> Оно</label><br><br>
            </div>
            <div class="filter-gender border-bottom">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                <label for="vehicle1"> Мужчина</label><br>
                <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                <label for="vehicle2"> Женщина</label><br>
                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                <label for="vehicle3"> Оно</label><br><br>
            </div>
            <div class="filter-gender border-bottom">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                <label for="vehicle1"> Мужчина</label><br>
                <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                <label for="vehicle2"> Женщина</label><br>
                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                <label for="vehicle3"> Оно</label><br><br>
            </div>
        </div>
        <div id="category_body" class="">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-6 p-3">
                    <a href="/product">
                        <img src="{{ asset('assets/img/banners/crossy.png') }}" class="img-fluid rounded">
                        <div class="product-title">Кроссовки</div>
                        <div class="product-category">Мужское</div>
                        <div class="d-flex justify-content-between">
                            <div class="product-price">100TMT</div>
                            <div class="product-sale">10%</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .border-bottom {
        margin-bottom: 10px;
        padding-bottom: 10px;
    }
</style>
<script>
    $(document).ready(function() {
        var filter = $("#filter");
        var category_body = $("#category_body");
        var filter_menu = $(".filter-menu");
        filter.on("click", function() {
            category_body.toggleClass("col-lg-10");
            filter_menu.toggleClass("d-none");
        });
    });
</script>

@endsection