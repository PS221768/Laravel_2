@extends('Components.navbar')

@section('content')
    <form action="/user" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="password_confirmation">Confirm password:</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <br><br>
        <input type="submit" value="Create">
    </form> 
@stop