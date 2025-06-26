@props(['user', 'size' => 'w-12 h-12'])

@if($user->profileImage())
    <img src="{{ $user->profileImage() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@else
    <img src="{{ asset('images/default-avatar.png') }}" alt="{{ $user->name }}" class="{{ $size }}s rounded-full">
@endif 