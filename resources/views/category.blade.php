<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategoriler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-screen-xl">
                    <div class="row">
                        <div class="col-md-12">
                            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'new-category')" class="float-end mb-3">{{ __('Yeni Kategori') }}</x-primary-button>
                        </div>
                        @foreach($category as $key)
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title"><strong class="h4">{{ $key->categoryName }}</strong></h2>
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
                                            <a href="{{ route('Category.edit', $key->id) }}" class="btn btn-success">Güncell</a>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <form method="post" action="{{ route('Category.destroy', $key->id) }}" class="inline-form float-end">
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


    <x-modal name="new-category" focusable>
        <form method="POST" action="{{ route('Category.store') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Yeni Kategori Oluştur') }}
            </h2>

            <div class="row">
                <div class="col-md-12 mt-3">
                    <x-input-label for="categoryName" value="Kategori Adı" class="sr-only" />
                    <x-text-input id="categoryName" name="categoryName" type="text" class="form-control" placeholder="Kategori Adı:"/>
                    <x-input-error :messages="$errors->get('categoryName')" class="mt-2 text-uppercase" />
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
