@extends('layouts/contentNavbarLayout')

@section('title', 'Изменить страницу')

@section('content')
    <div class="container my-3">
        <h3>Изменить страницу: </h3>
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="moduleCount" value="3">
            @for($i = 0; $i < count($contents); $i++)
                <div class="card p-2 mb-2">
                    <p class="fs-4">Block {{$i}}</p>
                    <select name="type{{$i}}" class="form-control">
                        <option value="category">Категория</option>
                    </select>
                    <select name="content{{$i}}" class="form-control">
                        @for($c = 0; $c < count($categories); $c++)
                            <option value="{{$categories[$c]['id']}}" @if($contents[$i]['content'] == $categories[$c]['id']) selected @endif>{{$categories[$c]['category_name']}}</option>
                        @endfor
                    </select>
                </div>
            @endfor
            <!-- ----------- -->
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </form>
    </div>
@endsection