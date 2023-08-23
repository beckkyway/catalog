<div class="cart">
    @foreach ($product as $item)
        <div class="cart__item">
            <img src="{{ $item->image->path ?? '/img/default-jija.jpg' }}" alt="упс..." class="item__image">
            <div class="item__name">{{ $item->name }}</div>
            <div class="item__description">{{ $item->description }}</div>
            <div class="item__price">{{ $item->price }} RUB</div>
            @if (isset($quantities[$item->id]))
                <p>Количество: {{ $quantities[$item->id] }}</p>
            @endif
            <button class="item__remove-btn" id="{{ $item->id }}">
                оформить отдельно
            </button>
        </div>
        <button class="item__remove-btn" id="{{ $item->id }}">
            оформить всё
        </button>
    @endforeach
</div>
