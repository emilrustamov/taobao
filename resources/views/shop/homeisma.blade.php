@extends('layouts/contentGuide')

@section('title', 'test')

{{-- @section('page-style')
<!-- My style -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/guide/style.css') }}">
@endsection --}}

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-8">
                <h3 class="m-0 p-0">HazynaShops</h3>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <i class="bx bxs-cart fs-3"></i>
            </div>
        </div>
        <hr>
        @for($i = 0; $i < count($page_contents); $i++)
        <div class="mb-3">
            <h4>{{$page_contents[$i]['category_name']}}</h4>
            <div class="row">
                @for($p = 0; $p < count($products); $p++)
                    @if($page_contents[$i]['content'] == $products[$p]['category_id'])
                        <div class="col-2">
                            <div class="card p-2">
                                <img src="{{ asset('assets/img/elements/1.jpg') }}" alt="" class="rounded-2">
                                <span class="fs-4 mt-2">{{$products[$p]['product_name']}}</span>
                                <span class="fs-5 fw-bold text-end">{{$products[$p]['price']}} TMT</span>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
        @endfor
    </div>
@endsection

<ul class="pt-5 p-0 menu-links">
    @foreach ($menuLinks as $menuLink)
      <li>
        <div>
          <img src="{{ $menuLink['iconSrc'] }}">
        </div>
        <div>
          {{ $menuLink['title'] }}
        </div>
      </li>
    @endforeach
</ul>
<div class="bottom-logo"><img src="{{ asset('img/logo.svg') }}"></div>