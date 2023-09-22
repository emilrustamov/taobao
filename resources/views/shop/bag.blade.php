@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}

@section('content')
    <div class="container-xxl row my-4 ">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <h3>Корзина</h3>
            <div class="row bag-item">
                <div class="col-2">
                    <img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="bg-img" />
                </div>
                <div class="col-8 d-flex flex-column justify-content-between">
                    <div>
                        <div class="product-title">Nike Dri-FIT ADV TechKnit Ultra</div>
                        <div class="product-category">Men's Short-Sleeve Running Top</div>
                        <div class="d-flex flex-row w-50 mt-2">
                            <p>Size: L</p>
                            <p class="mx-5">Quantity: 1</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row mt-2 w-50">
                        <span class="tf-icons bx bx-heart"></span>
                        <span class="tf-icons bx bx-trash mx-3"></span>
                    </div>
                </div>
                <div class="col-2 d-flex flex-column justify-content-between text-end">
                    <div>
                    <div class="product-price">3 895.00TMT</div>
                    <del class="thin-text">3 895.00TMT</del>
                    </div>
                    <div class="quantity-group">
                        <input type="button" value="-" class="button-minus" data-field="quantity">
                        <input type="number" step="1" max="" value="1" name="quantity"
                            class="quantity-field">
                        <input type="button" value="+" class="button-plus" data-field="quantity">
                    </div>
                </div>
            </div>
            <div class="divider">
                <div class="divider-text"></div>
            </div>
            <div class="row bag-item">
                <div class="col-2">
                    <img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="bg-img" />
                </div>
                <div class="col-8 d-flex flex-column justify-content-between">
                    <div>
                        <div class="product-title">Nike Dri-FIT ADV TechKnit Ultra</div>
                        <div class="product-category">Men's Short-Sleeve Running Top</div>
                        <div class="d-flex flex-row w-50 mt-2">
                            <p>Size: L</p>
                            <p class="mx-5">Quantity: 1</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row mt-2 w-50">
                        <span class="tf-icons bx bx-heart"></span>
                        <span class="tf-icons bx bx-trash mx-3"></span>
                    </div>
                </div>
                <div class="col-2 d-flex flex-column justify-content-between text-end">
                    <div>
                    <div class="product-price">3 895.00TMT</div>
                    <s class="thin-text">3 895.00TMT</s>
                </div>
                    <div class="quantity-group">
                        <input type="button" value="-" class="button-minus" data-field="quantity">
                        <input type="number" step="1" max="" value="1" name="quantity"
                            class="quantity-field">
                        <input type="button" value="+" class="button-plus" data-field="quantity">
                    </div>
                </div>
            </div>
            <div class="divider">
                <div class="divider-text"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 co-sm-12 ">

            <div class="total-block">
                <h3>Общая сумма</h3>
                <div class="d-flex flex-row justify-content-between mt-2">
                    <p>Сумма:</p>
                    <p class="bold">₹ 20 890.00</p>
                </div>
                <div class="d-flex flex-row justify-content-between mt-1">
                    <p class="thin-text red">Уже сэкономили:</p>
                    <p class="thin-text red bold">₹890.00</p>
                </div>
                <div class="d-flex flex-row  justify-content-between mt-1">
                    <p class="thin-text green">Баллы:</p>
                    <p class="thin-text green bold"><i class='bx bx-xs bxs-diamond'></i>250</p>
                </div>
                <button class="btn  black-btn  d-grid w-100 mt-3" type="submit">Добавить в корзину</button>
            </div>
        </div>

    </div>





@endsection
