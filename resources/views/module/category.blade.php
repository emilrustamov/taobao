<div class="mb-3">
    <h4>Category</h4>
    <div class="row">
        @for($p = 0; $p < 6; $p++)
        <div class="col-2">
            <div class="card p-2">
                <img src="{{ asset('assets/img/elements/'.$i+$p.'.jpg') }}" alt="" class="rounded-2">
                <span class="fs-4 mt-2">Title {{$i}} - {{$p}}</span>
                <span class="fs-5 fw-bold text-end">{{$i}}{{$p}} TMT</span>
            </div>
        </div>
        @endfor
    </div>
</div>