<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   <h2>All Users</h2>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Is Admin?</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

        @else
            <p>You are not an admin. Welcome!</p>
        @endif
    </div>
</x-app-layout>
