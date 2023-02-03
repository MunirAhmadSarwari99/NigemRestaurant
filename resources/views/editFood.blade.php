<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yiyecekleri Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-screen-xl">
                    <form method="POST" action="{{ route('Food.update', $food->id) }}" class="p-6" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Fotoğraf') }}
                        </h2>

                        <div class="row">
                            <div class="co-md-12">
                                <div class="col-md-6 mt-3">
                                    <img id="image-view" style="width: 200px; height: 150px;" class="img-thumbnail cursor-pointer" src="{{ asset('images/foods/' . $food->image) }}">
                                    <x-text-input id="image" name="image" type="file" class="hidden"/>
                                    <x-input-error :messages="$errors->get('image')" class="mt-2 text-uppercase" />
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <x-input-label for="category" value="Gıda Adı" class="sr-only" />
                                <select id="category" name="category" class="form-control">
                                    <option value="">Kategoril Seç:</option>
                                    @foreach($category as $key)
                                        <option
                                            @if($key->id == $food->category->id) selected @endif
                                            value="{{ $key->id }}">{{ $key->categoryName }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2 text-uppercase" />
                            </div>
                            <div class="col-md-6 mt-3">
                                <x-input-label for="foodName" value="Gıda Adı" class="sr-only" />
                                <x-text-input id="foodName" name="foodName" type="text" class="form-control" placeholder="Gıda Adı:" value="{{ $food->foodName }}"/>
                                <x-input-error :messages="$errors->get('foodName')" class="mt-2 text-uppercase" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <x-input-label for="price" value="Fiyat" class="sr-only" />
                                <x-text-input id="price" name="price" type="text" class="form-control" placeholder="Fiyat:" value="{{ $food->price }}"/>
                                <x-input-error :messages="$errors->get('price')" class="mt-2 text-uppercase" />
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <a href="{{ route('Food.index') }}" class="btn btn-dark">{{ __('İptal') }}</a>
                            &nbsp;&nbsp;
                            <x-primary-button>{{ __('Kayded') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
