<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gıdalar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-screen-xl">
                    <div class="row">
                        <div class="col-md-12">
                            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'new-food')" class="float-end mb-3">{{ __('Yeni Gıda') }}</x-primary-button>
                        </div>
                        @foreach($food as $key)
                            <div class="col-md-4 mt-3">
                                <div class="card">
                                    <img style="height: 220px;" src="{{ asset('images/foods/' . $key->image) }}" class="card-img-top " alt="{{ $key->image }}">
                                    <div class="card-body">
                                        <h4 class="card-title h4">{{ $key->foodName }} <span class="badge bg-secondary h6">{{ $key->category->categoryName }}</span></h4>
                                        <strong class="text-danger">{{ $key->price }} TL</strong>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="card-subtitle mt-2 text-muted">Oluşturma Tarihi</h6>
                                                {{ $key->created_at->diffForHumans() }}
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="card-subtitle mt-2 text-muted">Güncelleme Tarihi</h6>
                                                {{ $key->updated_at->diffForHumans() }}
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <a href="{{ route('Food.edit', $key->id) }}" class="btn btn-success">Güncell</a>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <form method="post" action="{{ route('Food.destroy', $key->id) }}" class="inline-form float-end">
                                                    @csrf
                                                    @method('delete')
                                                    <x-danger-button>
                                                        {{ __('Sil') }}
                                                    </x-danger-button>
                                                </form>
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

    <x-modal name="new-food" focusable>
        <form method="POST" action="{{ route('Food.store') }}" class="p-6" enctype="multipart/form-data">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Yeni Gıda Oluştur') }}
            </h2>

            <div class="row">
                <div class="co-md-12">
                    <div class="col-md-6 mt-3">
                        <img id="image-view" style="width: 200px; height: 150px;" class="img-thumbnail cursor-pointer" src="{{ asset('images/food.jpg') }}">
                        <x-text-input id="image" name="image" type="file" class="hidden"/>
                        <x-input-error :messages="$errors->get('image')" class="mt-2 text-uppercase" />
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <x-input-label for="category" value="Gıda Adı" class="sr-only" />
                    <select id="category" name="category" class="form-control">
                        <option value="">Kategoril Seç:</option>
                        @foreach($category as $key)
                            <option value="{{ $key->id }}">{{ $key->categoryName }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2 text-uppercase" />
                </div>
                <div class="col-md-6 mt-3">
                    <x-input-label for="foodName" value="Gıda Adı" class="sr-only" />
                    <x-text-input id="foodName" name="foodName" type="text" class="form-control" placeholder="Gıda Adı:"/>
                    <x-input-error :messages="$errors->get('foodName')" class="mt-2 text-uppercase" />
                </div>
                <div class="col-md-12 mt-3">
                    <x-input-label for="price" value="Fiyat" class="sr-only" />
                    <x-text-input id="price" name="price" type="text" class="form-control" placeholder="Fiyat:"/>
                    <x-input-error :messages="$errors->get('price')" class="mt-2 text-uppercase" />
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
