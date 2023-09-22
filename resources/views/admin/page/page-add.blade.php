@extends('layouts/contentNavbarLayout')

@section('title', 'Добавить страницу')

@section('content')
    <div class="container my-3">
        <h3>Добавить страницу</h3>
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="moduleCount" value="3">
            @for($i = 0; $i < count($categories); $i++)
            <div class="card p-2 mb-2">
                <p class="fs-4">Block {{$i}}</p>
                <select name="type{{$i}}" class="form-control">
                    <option value="category">Категория</option>
                </select>
                <select name="content{{$i}}" class="form-control">
                    @for($c = 0; $c < count($categories); $c++)
                        <option value="{{$categories[$c]['id']}}">{{$categories[$c]['category_name']}}</option>
                    @endfor
                </select>
            </div>
            <!-- ----------- -->
            @endfor
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </form>
    </div>
@endsection