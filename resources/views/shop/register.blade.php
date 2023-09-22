@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}

@section('content')

    {{-- @php
        $products = [['title' => 'Платье', 'price' => '₹ 3 895', 'category' => 'Women s Shoes', 'sale' => '-32%', 'img' => '/crossy.png'], ['title' => 'Платье', 'price' => '₹ 3 895', 'category' => 'Women s Shoes', 'sale' => '-32%', 'img' => '/crossy.png'], ['title' => 'Платье', 'price' => '₹ 3 895', 'category' => 'Women s Shoes', 'sale' => '-32%', 'img' => '/crossy.png'], ['title' => 'Платье', 'price' => '₹ 3 895', 'category' => 'Women s Shoes', 'sale' => '-32%', 'img' => '/crossy.png']];
    @endphp --}}


    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="login-card">
                    <div class="login-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder mb-3">Logotip</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 bold text-center">ДОБРО ПОЖАЛОВАТЬ В <span class="logo-red">Maimai</span></h4>
                        {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

                        <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email-username"
                                    placeholder="Email" autofocus="">
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="firstName" name="firstName" value="John"
                                    autofocus="">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">US (+1)</span>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="202 555 0111">
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Введите пароль</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="············" aria-describedby="password">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="country">Велаят</label>
                                <select id="country" class="select2 form-select">
                                    <option value="">Выбрать</option>
                                    <option value="Australia">Ahal region</option>
                                    <option value="Bangladesh">Lebap region</option>
                                    <option value="Belarus">Balkan region</option>
                                    <option value="Brazil">Mary region</option>
                                    <option value="Canada">Dashoguz</option>

                                </select>
                            </div>
                            <div class="mb-3">
                              {{--  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label thin-text" for="remember-me">
                                        Подпишитесь на электронные письма, чтобы получать новости от Aimai о продуктах,
                                        предложениях и преимуществах для участников.
                                    </label>
                                </div> --}}
                            </div>
                            <div class="mb-3">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <p class="thin-text ">Создавая аккаунт, вы соглашаетесь с <a href="#"><span
                                            class="text-decoration-underline">Политикой конфиденциальности</span></a></p>
                            </div>
                            <div class="mb-3">
                                <button class="btn black-btn d-grid mx-auto" type="submit">Зарегистрироваться</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Уже есть аккаунт?</span>
                            <a href="auth-register-basic.html">
                                <span>Войдите</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>



@endsection
