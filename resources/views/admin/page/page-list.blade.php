@extends('layouts/contentNavbarLayout')

@section('title', 'Страницы')

@section('content')

<div class="container my-3">
    <div class="d-flex justify-content-between">
        <span class="fs-2">Страницы</span>
        <div class="d-flex align-items-center">
            <a href="/admin/page-add" class="btn btn-outline-primary p-2">
                <i class="bx bx-plus"></i>
                <span>Создать страницы</span>
            </a>
        </div>
    </div>
    {{-- Table --}}
    @if(count($pages) != 0)
    <div class="mt-3">
        <table class="table table-hover cursor-pointer text-center">
            <thead>
                <tr>
                    <th scope="col">Название страницы</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Дата изменения</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr>
                    <td class="text-start">{{$page['name']}}</td>
                    <td>{{$page['status']}}</td>
                    <td>{{$page['updated_at']}}</td>
                    <td>{{$page['created_at']}}</td>
                    <td><a class="bx bx-pencil" href="/admin/page-edit/{{$page['id']}}"></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center my-3">
        <h4>Нет страниц</h4>
    </div>
    @endif
</div>

@endsection