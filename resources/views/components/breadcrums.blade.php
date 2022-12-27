<div>
    <ol class="breadcrumb text-muted fs-6 fw-semibold mt-3">
        @foreach ($links as $key => $link)
            <li class="breadcrumb-item pe-3 @if ($link == false) text-muted @endif ">
                @if($link == false)
                {{ $key }}
                @else
                <a href="{{ $link }}" class="pe-3">{{ $key }}</a>
                @endif
            </li>
        @endforeach
    </ol>
</div>
