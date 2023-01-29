@extends('Components.navbar')

@section('content')

    <form action="/user/{{ $user->id }}" method="POST">
    <input type='hidden' name='_method' value='PUT'>
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>

        <br><br>
        <input type="submit" value="Edit">
    </form> 
@stop