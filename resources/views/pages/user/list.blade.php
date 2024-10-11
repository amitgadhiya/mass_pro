<!-- resources/views/user/index.blade.php -->

@extends('layout')

@section('title', 'User List')

@section('content')
    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @php
                $users = [
        (object) ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'created_at' => now()],
        (object) ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'created_at' => now()],
        (object) ['id' => 3, 'name' => 'Alice Johnson', 'email' => 'alice@example.com', 'created_at' => now()],
        (object) ['id' => 4, 'name' => 'Bob Brown', 'email' => 'bob@example.com', 'created_at' => now()],
        (object) ['id' => 5, 'name' => 'Charlie Black', 'email' => 'charlie@example.com', 'created_at' => now()],
        (object) ['id' => 6, 'name' => 'Daisy White', 'email' => 'daisy@example.com', 'created_at' => now()],
        (object) ['id' => 7, 'name' => 'Eve Green', 'email' => 'eve@example.com', 'created_at' => now()],
        (object) ['id' => 8, 'name' => 'Frank Blue', 'email' => 'frank@example.com', 'created_at' => now()],
        (object) ['id' => 9, 'name' => 'Grace Purple', 'email' => 'grace@example.com', 'created_at' => now()],
        (object) ['id' => 10, 'name' => 'Hank Red', 'email' => 'hank@example.com', 'created_at' => now()],
    ];
            @endphp
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
