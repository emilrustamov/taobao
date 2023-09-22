@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}





@section('content')

<div class="wrapper my-3">
    <div class="row h-100">
        <div class="col-lg-9">
            <div class="mt-3">
                <h2>Учетная запись</h2>
                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
            <div class="mt-3">
                <h2>Основная информация</h2>
                <div class="table-responsive-sm table-box">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Имя</th>
                                <th scope="col">Почта</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Эмиль</td>
                                <td class="d-flex justify-content-between">
                                    <span>e.rustamov@lotta-tm.com</span>&nbsp;<a href="https://theouts.shop/index.php?route=account/edit">Изменить</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                <h2>История заказов</h2>
                <div class="table-responsive-sm">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">№ заказа</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Дата заказа</th>
                                <th scope="col">Сумма</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Пока нет заказов.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <aside id="column-right" class="col-lg-3">
            <div class="h-100">
                <ul class="account-list list-unstyled">
                    <li class="account-item"><a class="account-link d-flex align-items-center" href="/cabinet" rel="nofollow"><i class="fa fa-info-circle"></i><span>Информация</span></a></li>
                    <li class="account-item"><a class="account-link d-flex align-items-center" href="#" rel="nofollow"><i class="fa fa-edit"></i><span>Изменить контактную информацию</span></a></li>
                    <li class="account-item"><a class="account-link d-flex align-items-center" href="#" rel="nofollow"><i class="fa fa-heart"></i><span>Закладки</span></a></li>
                    <li class="account-item"><a class="account-link d-flex align-items-center" href="#" rel="nofollow"><i class="fa fa-file"></i><span>История заказов</span></a></li>
                    <!-- <li class="account-item"><a class="account-link d-flex align-items-center" href="#" rel="nofollow"><i class="fa fa-star"></i><span>Бонусные баллы</span></a></li>
                    <li class="account-item"><a class="account-link d-flex align-items-center" href="#" rel="nofollow"><i class="fa fa-address-card"></i><span>Партнерская программа</span></a></li> -->
                    <li class="account-item"><a class="account-link d-flex align-items-center" href="#" rel="nofollow"><i class="fa fa-power-off"></i><span>Выйти</span></a></li>
                </ul>

            </div>
        </aside>
    </div>

</div>

<style>
    .account-list .account-link {
        font-size: 1rem;
        line-height: 19px;
        padding: 15px 30px;

        letter-spacing: .3px;
        text-decoration: none;
        -webkit-transition: color .3s ease, background-color .3s ease;
        transition: color .3s ease, background-color .3s ease;
    }

    .account-list .account-link i {
        font-size: 20px;
        margin-right: 15px;
    }

    .account-item:hover .account-link {
        color: #fff;
        background: #FF6D2A;
    }
</style>

@endsection