@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}

@section('content')
<div class="wrapper my-3">
    <div class="row gx-5">
        <div class="col-lg-7 col-12">
            <div class="product-images row">
                <div class="col-12 col-lg-10 full-pic">
                    <img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    <div class="favorite">
                        <label class="like">
                            <input type="checkbox" id="like" />
                            <div class="hearth"></div>
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 col-12 column-pic product-thumb slider ">
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>
                    <div><img src="{{ asset('assets/img/banners/product-pic.svg') }}" alt="avatar" class="img-fluid" />
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-4 col-12">
            <div>
                <h1 class="title-lg mt-sm-0 mt-3">Nike Air Max 97 SE</h1>
                <div class="product-category">Men's Shoes</div>
                <div class="product-price">Цена : 100 TMT</div>
            </div>
            <div class="size-box mt-3">
                <div class="d-flex justify-content-between">
                    <h4>Опции:</h4>
                    <div>
                        <h4 class="primary table-size-btn" onclick="window.dialog.showModal();">Таблица размеров</h4>
                        <dialog id="dialog">
                            <h2>Таблица размеров</h2>
                            <p>A CSS-only modal based on the <a href="https://developer.mozilla.org/es/docs/Web/CSS/::backdrop" target="_blank">::backdrop</a> pseudo-class. Hope you find it helpful.</p>
                            <p>You can also change the styles of the <code>::backdrop</code> from the CSS.</p>
                            <button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
                        </dialog>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-around gap-2">
                    <div class="attribute">UK 6 (EU 40)</div>
                    <div class="attribute">UK 6 (EU 40)</div>
                    <div class="attribute">UK 6 (EU 40)</div>
                    <div class="attribute">UK 6 (EU 40)</div>
                    <div class="attribute">UK 6 (EU 40)</div>
                    <div class="attribute">UK 6 (EU 40)</div>
                </div>
                <h4 class="mt-3">Тип доставки:</h4>
                <div class="delivery-container">
                    <label class="label-delivery "><input type="radio" name="e" class="input-delivery custom-vertical-align"> Стандарт<sup>?</sup></label>
                    <label class="label-delivery "><input type="radio" name="e" class="input-delivery custom-vertical-align"> Экспресс<sup>?</sup></label>
                    <label class="label-delivery "><input type="radio" name="e" class="input-delivery custom-vertical-align"> Спецдоставка<sup>?</sup></label>
                </div>
                <button class="btn  black-btn  d-grid w-100 mt-3" type="submit">
                    Добавить в корзину
                </button>

            </div>
        </div>

        <div class="col-lg-7">
            <div class="accordion mt-3" id="accordionExample">
                <div class="faq accordion-item active">
                    <h2 class="accordion-header" id="headingOne">
                        <button type="button" class="accordion-button p-0" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                            Информация об условиях доставки
                        </button>
                    </h2>

                    <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps
                            icing marzipan gummi
                            bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping soufflé. Wafer
                            gummi bears
                            marshmallow pastry pie.
                        </div>
                    </div>
                </div>
                <div class="faq accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button type="button" class="accordion-button p-0 collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                            Способы оплаты
                        </button>
                    </h2>
                    <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat
                            cake dragée ice
                            cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies. Jelly beans
                            candy canes
                            carrot cake. Fruitcake chocolate chupa chups.
                        </div>
                    </div>
                </div>
                <div class="faq accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button type="button" class="accordion-button p-0 collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                            Есть ли возможность отслеживания моего заказа?
                        </button>
                    </h2>
                    <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                            gingerbread
                            marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake dragée
                            caramels. Ice cream
                            wafer danish cookie caramels muffin.
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4">
            <details class="mt-3 product-desc" open>
                <summary>Описание:</summary>
                Layer on style with the Air Max 97. The cracked leather and soft suede update the iconic
                design while the
                original look (inspired by Japanese bullet trains and water droplets) still takes centre stage.
                Easy-to-style colours let you hit the streets quickly.
            </details>
        </div>
        <div class="col-lg-12 mt-5">
            <h4>Рекомендуемые:</h4>
            <section class="recomended-products slider">
                <div class="p-3">
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
                <div class="p-3">
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
                <div class="p-3">
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
                <div class="p-3">
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
                <div class="p-3">
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
                <div class="p-3">
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
            </section>
        </div>
    </div>
</div>


@endsection