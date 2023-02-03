<x-my-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Anasayfa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-screen-xl">
                    <div class="row">
                        <strong>Sana Özel Ürünler</strong>
                        @foreach($foods as $key)
                            <div class="col-md-2 mt-3">
                                <div class="card">
                                    <img style="height: 150px;" src="{{ asset('images/foods/' . $key->image) }}" class="card-img-top" alt="{{ $key->image }}">
                                    <div class="card-body">
                                        <span class="badge bg-secondary">{{ $key->category->categoryName }}</span>
                                        <h4 class="card-title h5 mt-3">{{ $key->foodName }}</h4>
                                        <strong class="text-danger">{{ $key->price }} TL</strong>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <a href="{{ route('Order.show', $key->id) }}" class="btn btn-outline-secondary float-end">Sipariş Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-my-layout>
