<div class="cart">
    @foreach ($product as $item)
        <div class="cart__item">
            <img src="{{ $item->image->path ?? '/img/default-jija.jpg' }}" alt="упс..." class="item__image">
            <div class="item__name">{{ $item->name }}</div>
            <div class="item__description">{{ $item->description }}</div>
            <div class="item__prices">
                @if ($item->new_price)
                    <s>{{ $item->price }}</s> <span>{{ $item->new_price }}</span> RUB
                @else
                    {{ $item->price }} RUB
                @endif
            </div>
            <div>
                <button type="button" class="btn btn-info btn-increment" data-product_id="{{ $item->id }}">
                    +
                </button>
                <button type="button" class="btn btn-info btn-decrement" data-product_id="{{ $item->id }}">
                    -
                </button>
            </div>
            <p data-count="{{$quantities[$item->id]}}" id="count{{ $item->id }}">Количество: {{ $quantities[$item->id] }}</p>
            <button class="item__remove-btn" id="{{ $item->id }}">
                оформить отдельно
            </button>
        </div>
    @endforeach
</div>
