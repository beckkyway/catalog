<div class="catalog">
    @foreach ($model as $item)
        <div class="catalog__item">
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
            <button class="item__btn" id="{{$item->id}}">
                Добавить в корзину
            </button>
        </div>
    @endforeach
</div>