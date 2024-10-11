<!-- resources/views/user/create.blade.php -->

@extends('layout')

@section('title', 'Add User')

@section('content')
    <h1>Add User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <button type="submit">Add User</button>
    </form>
@endsection
