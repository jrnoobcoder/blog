 @props(['user'])

 <div {{ $attributes }} x-data="{ isFollowing: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }}, 
                        followersCount: {{ $user->followers()->count() }},
                        follow() {
                            
                            axios.post('/follow/{{ $user->id }}', { 
                                user_id: {{ $user->id }} 
                            }).then(response => {
                                console.log('Success:', response.data);
                                this.isFollowing = !this.isFollowing;
                                this.followersCount = response.data.followersCount;
                            }).catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while trying to follow/unfollow the user.');
                               
                            });
                        }

                    }"

                        class="w-[320px] border-l border-gray-200 dark:border-gray-700 pl-8">
{{ $slot }}
 </div>