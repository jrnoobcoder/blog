<x-app-layout>


    <div class="py-4">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">       
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h1>
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" class="w-12 h-12 rounded-full" /> 
                    <div>
                        <div class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user->username) }}" class="text-gray-900 dark:text-white">{{ $post->user->name }}</a>
                            <a href="#" class="text-sm text-gray-500 dark:text-gray-400 hover:underline">
                               Follow
                            </a>
                        </div>
                        <div class="flex gap-2 text-sm text-gray-500 dark:text-gray-400">
                            <span>{{ $post->readTime() }} min read </span>
                            <span>•</span> 
                            {{-- <span>{{ $post->created_at->diffForHumans() }}</span> --}}
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
              
                <x-clap-button />

                <div class="mt-4">
                    @if($post->image)
                        <img src="{{ $post->postImgUrl() }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg mb-4">
                    @endif
                    <div class="mt-4">
                        <p class="text-gray-700 dark:text-gray-300">{{ $post->content }}</p>
                    </div>

                    <div class="mt-8 text-gray-700 dark:text-gray-300">
                        <span class="inline-block px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded-full text-sm font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        {{ $post->category ? $post->category->name : 'Uncategorized' }}
                        </span>
                    </div>
                </div>
                <x-clap-button />
          

            </div>
            
        </div>
    </div>
</x-app-layout>
