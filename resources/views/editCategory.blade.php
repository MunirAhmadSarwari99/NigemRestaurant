<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategoriyi Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-screen-xl">
                    <form method="POST" action="{{ route('Category.update', $category->id) }}" class="p-6">
                        @csrf
                        @method('PATCH')
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Kategori Adı') }}
                        </h2>

                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <x-input-label for="categoryName" value="Kategori Adı" class="sr-only" />
                                <x-text-input id="categoryName" name="categoryName" type="text" class="form-control" placeholder="Kategori Adı:" value="{{ $category->categoryName }}"/>
                                <x-input-error :messages="$errors->get('categoryName')" class="mt-2 text-uppercase" />
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <a href="{{ route('Category.index') }}" class="btn btn-dark">{{ __('İptal') }}</a>
                            &nbsp;&nbsp;
                            <x-primary-button>{{ __('Kayded') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
