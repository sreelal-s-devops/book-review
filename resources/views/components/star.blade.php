<div>
    @if ($rating)
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= round($rating))
                <i class="fa-solid fa-star"></i>
            @else
                <i class="fa-regular fa-star"></i>
            @endif
        @endfor
    @else
        No Rating!!
    @endif
</div>