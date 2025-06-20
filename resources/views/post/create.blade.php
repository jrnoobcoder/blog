<x-app-layout>


    <div class="py-4">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">       
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <!-- Excerpt -->
                    <div class="mt-4">
                        <x-input-label for="excerpt" :value="__('Excerpt')" />
                        <textarea id="excerpt" name="excerpt" rows="3" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300" placeholder="Enter excerpt">{{ old('excerpt') }}</textarea>
                        <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />  
                    </div>
                    <!-- Content -->    
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <textarea id="content" name="content" rows="5" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300" placeholder="Enter content">{{ old('content') }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <!-- Category -->
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select id="category_id" name="category_id" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />  
                    </div>
                    <!-- Image Upload -->
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <input id="image" type="file" name="image" accept="image/*" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-6">
                        <x-primary-button>
                            {{ __('Create Post') }}
                        </x-primary-button>
                    </div>

                </form>

              
            </div>
            
        </div>
    </div>
</x-app-layout>
