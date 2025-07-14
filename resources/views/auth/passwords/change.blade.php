@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-12">
    @if(session('status'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
        @csrf @method('PUT')

        <x-input-label for="current_password" value="Current password" />
        <x-text-input id="current_password" type="password" name="current_password" required />

        <x-input-label for="password" value="New password" />
        <x-text-input id="password" type="password" name="password" required />

        <x-input-label for="password_confirmation" value="Confirm new password" />
        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />

        <x-primary-button>Update Password</x-primary-button>
    </form>
</div>
@endsection
