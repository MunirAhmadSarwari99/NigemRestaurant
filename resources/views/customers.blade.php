<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Müşteriler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-screen-xl">
                    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'new-customer')" class="float-end mb-3">{{ __('Yeni Müşteri') }}</x-primary-button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>Müşteri Adı</th>
                                <th>Telefon</th>
                                <th>E-posta</th>
                                <th>Adres</th>
                                <th>Oluşturma Tarihi</th>
                                <th>Güncelleme Tarihi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customer as $key)
                            <tr>
                                <td><img class="img-thumbnail w-20" src="{{ asset('images/customers/' . $key->image) }}"></td>
                                <td>{{ $key->customerName }}</td>
                                <td>{{ $key->phone }}</td>
                                <td>{{ $key->email }}</td>
                                <td>{{ $key->address }}</td>
                                <td>{{ $key->created_at->diffForHumans() }}</td>
                                <td>{{ $key->updated_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <x-modal name="new-customer" focusable>
        <form method="POST" action="{{ route('Customer.store') }}" class="p-6" enctype="multipart/form-data">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Yeni Müşteri Oluştur') }}
            </h2>

            <div class="row">
                <div class="co-md-12">
                    <div class="col-md-6 mt-3">
                        <img id="image-view" style="width: 200px; height: 150px;" class="img-thumbnail cursor-pointer" src="{{ asset('images/default.jpg') }}">
                        <x-text-input id="image" name="image" type="file" class="hidden"/>
                        <x-input-error :messages="$errors->get('image')" class="mt-2 text-uppercase" />
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <x-input-label for="customerName" value="Müşteri Adı" class="sr-only" />
                    <x-text-input id="customerName" name="customerName" type="text" class="form-control" placeholder="Müşteri Adı:"/>
                    <x-input-error :messages="$errors->get('customerName')" class="mt-2 text-uppercase" />
                </div>
                <div class="col-md-6 mt-3">
                    <x-input-label for="phone" value="Telefon" class="sr-only" />
                    <x-text-input id="phone" name="phone" type="text" class="form-control" placeholder="Telefon:"/>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2 text-uppercase" />
                </div>
                <div class="col-md-6 mt-3">
                    <x-input-label for="email" value="E-posta" class="sr-only" />
                    <x-text-input id="email" name="email" type="email" class="form-control" placeholder="E-posta:"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-uppercase" />
                </div>
                <div class="col-md-6 mt-3">
                    <x-input-label for="address" value="Adres" class="sr-only" />
                    <x-text-input id="address" name="address" type="text" class="form-control" placeholder="Adres:"/>
                    <x-input-error :messages="$errors->get('address')" class="mt-2 text-uppercase" />
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('İptal') }}
                </x-secondary-button>
                &nbsp;&nbsp;
                <x-primary-button>{{ __('Kayded') }}</x-primary-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
