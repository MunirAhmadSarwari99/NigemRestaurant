<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sipariş Ver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-screen-xl">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('images/foods/'. $food->image ) }}">
                                </div>
                            </div>
                            <h4 class="fw-bold mt-3">{{ $food->foodName }}</h4>
                            <h4 class="fw-bold mt-1 text-danger">{{ $food->price }} TL</h4>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('Order.store') }}" class="p-6">
                                @csrf

                                <h2 class="text-lg font-medium text-gray-900 fw-bold">
                                    {{ __('Sipariş Bilgileri') }}
                                </h2>
                                <div class="alert alert-secondary" role="alert">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Kategori:</th>
                                                <td>{{ $food->category->categoryName }}</td>
                                            </tr>
                                            <tr>
                                                <th>Adı:</th>
                                                <td>{{ $food->foodName }}</td>
                                            </tr>
                                            <tr>
                                                <th>Fiyat: </th>
                                                <td>{{ $food->price }}</td>
                                            </tr>
                                            <tr>
                                                <th>KDV:</th>
                                                <td>{{ $kdv }}</td>
                                            </tr>
                                            <tr>
                                                <th>Toplam: </th>
                                                <td>{{ $total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <x-input-label for="quanti" value="Adet:" class="sr-only" />
                                        <select id="quanti" name="quanti" class="form-control">
                                            <option value="">Adet Seç</option>
                                            @for($i = 1; $i < 11; $i ++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <x-input-error :messages="$errors->get('quanti')" class="mt-2 text-uppercase" />
                                    </div>
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-text-input name="foodID" type="hidden" value="{{ $food->id }}"/>
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('İptal') }}
                                    </x-secondary-button>
                                    &nbsp;&nbsp;
                                    <x-primary-button>{{ __('Kayded') }}</x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
