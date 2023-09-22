@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}

@section('content')
    <div class="container ">
        <div class="authentication-wrapper login-wrapper authentication-basic custom-vertical-align">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="login-card mx-auto">
                    <div class="login-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">

                                <span class="app-brand-text demo text-body fw-bolder mb-3">Logotip</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 bold text-center">ДОБРО ПОЖАЛОВАТЬ В <span class="logo-red">AIMAI</span></h4>
                        {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

                        <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email-username"
                                    placeholder="Email" autofocus="">
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Введите пароль</label>
                                    <a href="/register">
                                        <small>Забыли пароль?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="············" aria-describedby="password">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label thin-text" for="remember-me">
                                        Запомнить меня
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p class="thin-text">Выполняя вход, вы соглашаетесь с <a href="#"><span
                                            class="text-decoration-underline">Политикой конфиденциальности</span></a> </p>
                            </div>
                            <div class="mb-3">
                                <button class="btn black-btn d-grid mx-auto" type="submit">Войти</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Не зарегистрированы?</span>
                            <a href="/register">
                                <span>Регистрация</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>




@endsection
