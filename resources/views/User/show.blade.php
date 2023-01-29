@extends('Components.navbar')

@section('content')
    @isset($user)
        <h2 class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
            Name: {{ $user->name }} <br>
            Email: {{ $user->email }} <br>
            Account created at: {{ $user->created_at }} <br>
            Account updated at: {{ $user->updated_at }} <br>
        </h1>


    @endisset

    @empty($user)
        <p>no user found with this id</p>
    @endempty

@stop