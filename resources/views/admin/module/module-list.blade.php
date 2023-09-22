@extends('layouts/contentNavbarLayout')

@section('title', 'Модули')

@section('content')

<div class="container my-3">
    <div class="d-flex justify-content-between">
        <span class="fs-2">Модули</span>
        <div class="d-flex align-items-center">
            <a href="/admin/module-add" class="btn btn-outline-primary p-2">
                <i class="bx bx-plus"></i>
                <span>Создать модуль</span>
            </a>
        </div>
    </div>
    {{-- Table --}}
    @if(count($modules) != 0)
    <div class="mt-3">
        <table class="table table-hover cursor-pointer text-center">
            <thead>
                <tr>
                    <th scope="col">Название модуля</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Дата изменения</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modules as $module)
                <tr>
                    <td class="text-start">{{$module['name']}}</td>
                    <td>{{$module['status']}}</td>
                    <td>{{$module['updated_at']}}</td>
                    <td>{{$module['created_at']}}</td>
                    <td><a class="bx bx-pencil" href="/admin/module-edit/{{$module['id']}}"></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center my-3">
        <h4>Нет модулей</h4>
    </div>
    @endif
</div>

@endsection