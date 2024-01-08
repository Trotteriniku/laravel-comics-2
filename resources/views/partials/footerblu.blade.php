@php
    $smallicons = config('smallicondb.smallicons');
@endphp
<div class="bg-primary">
    <div class=" container py-4 ">
        <div class=" row flex-nowrap ">
            <div class="d-flex justify-content-between">
                @foreach ($smallicons as $item)
                    <div class="d-flex align-items-center">
                        <img src="{{ Vite::asset($item['blueicon']) }}" alt="profile" style="width: 50px">
                        <h6 class="ps-3 text-light fw-semibold ">{{ $item['text'] }}</h6>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
