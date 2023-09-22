@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}

@section('content')

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="login-card">
                    <div class="login-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">

                                <span class="app-brand-text demo text-body fw-bolder mb-3">Sneat</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 bold text-center">ОСТАВИТЬ ЗАПРОС</h4>
                        <p class="text-center">Возможность заказа по заявки сделано специально, чтобы не ограничивать наших
                            покупателей в выборе. </p>
                        {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

                        <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="title" name="apply-tiitle"
                                    placeholder="Наименование" autofocus="">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="mb-3">

                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Введите описание"></textarea>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" id="firstName" name="firstName"
                                    placeholder="Ваше имя" autofocus="">
                            </div>
                            <div class="mb-3">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">US (+1)</span>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="202 555 0111">
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn black-btn d-grid mx-auto" type="submit">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
