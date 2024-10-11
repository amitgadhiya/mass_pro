<!-- resources/views/user/edit.blade.php -->

@extends('layout')

@section('title', 'Edit User')

@section('content')
    <h1>Edit User</h1>
    <form action="" method="POST">
        @csrf
        @method('PUT') <!-- Method spoofing for update -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        
        <button type="submit">Update User</button>
    </form>
@endsection
