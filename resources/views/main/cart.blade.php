@extends('main.layouts.layouts')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if($Carts->isEmpty())
                <div class="text-center">
                    <p>У вас немає доданих товарів</p>
                </div>
            @else
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($Carts as $Cart)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <a href="{{route('posts.show', ['slug' => $Cart->post->slug])}}">
                                    <img src="{{ $Cart->post->getImage() }}" alt="{{ $Cart->post->name }}" width="268">
                                </a>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$Cart->post->name}}</h5>
                                        <!-- Product price-->
                                        {{$Cart->price}}$
                                        <p>Кількість: {{$Cart->quantity}}</p>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <form action="{{ route('cart.remove', ['id' => $Cart->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Видалити з корзини</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="" class="btn btn-primary">Придбати</a>
                    <p>Загальна сума: {{$totalPrice}}$</p>
                </div>

            @endif
        </div>
    </section>
@endsection
