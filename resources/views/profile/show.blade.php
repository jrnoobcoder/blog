<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex gap-8 ">
                    <div class="flex-1 ">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}'s Profile</h3>
                        <div class="mt-8">
                            @forelse ( $posts as $post )
                                <x-post-component :post="$post" class="mb-4" />
                            @empty
                                <div class="text-center text-gray-500 dark:text-gray-400 py-16">
                                    <p>No posts available.</p>
                                </div>
                                
                            @endforelse
                        </div>
                    </div>
                    <div x-data="{ isFollowing: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }}, 
                        followersCount: {{ $user->followers()->count() }},
                        follow() {
                            this.isFollowing = !this.isFollowing
                            axios.post('/follow/{{ $user->id }}', { 
                                user_id: {{ $user->id }} 
                            }).then(response => {
                                console.log('Success:', response.data);
                                this.followersCount = response.data.followersCount;
                            }).catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while trying to follow/unfollow the user.');
                               
                            });
                        }

                    }"

                        class="w-[320px] border-l border-gray-200 dark:border-gray-700 pl-8">
                        <x-user-avatar :user="$user" size="w-24 h-24" class="w-24 h-24 rounded-full mb-4" />
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h1>
                        <p class="text-gray-600 dark:text-gray-400">{{ $user->username }}</p>
                        <p class="text-gray-600 dark:text-gray-400">
                        <p class="text-gray-600 dark:text-gray-400">
                            <span x-text="followersCount"></span> Followers
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">Joined {{ $user->created_at->format('M Y') }}</p>
                        <p accesskey="{{ $user->bio }}" class="mt-4 text-gray-700 dark:text-gray-300">{{ $user->bio }}</p>
                        @if(auth()->user() && auth()->user()->id !== $user->id)
                        <div class="flex">
                            <button 

                                x-text="isFollowing ? 'Unfollow' : 'Follow'"
                                 @click="follow()" 
                                 :class="isFollowing ? 'bg-red-600 hover:bg-red-700' : 'bg-blue-600 hover:bg-blue-700'"
                                 class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Follow
                            </button>
                            <button class="mt-4 ml-2 px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 dark:focus:ring-gray-600 focus:ring-offset-2">
                                Message
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
