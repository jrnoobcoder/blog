<x-app-layout>


    <div class="py-4">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">       
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h1>
                <div class="flex gap-4">
                    @if($post->user->profileImage())
                        <img src="{{ $post->user->profileImage() }}" alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full">
                    @endif  
                
                </div>
              
            </div>
            
        </div>
    </div>
</x-app-layout>
