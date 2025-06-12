@extends('base')
@section('title', 'Login')

<div>
    <h2>Login</h2>

    @if(Session("success"))
        <div>
            {{ session('success') }}
        </div>
    @endif

    @if(Session("error"))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <form method="post" action="{{ route('auth.login')}}">
        @csrf
<div>
    <div>
            <label>Email Address: </label>
            <div>
            @error('email')
            <span>{{ $message }}</span>
            @enderror
</div>

<div>
            <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
</div>


<div>
    <div>
            <label>Password: </label>
            <div>
            @error('password')
            <span>{{ $message }}</span>
            @enderror
</div>
            <input type="password" id="password" name="password" placeholder="Enter Password">
</div>

<div>
        <button type="submit">Login</button>
    </form>


        <button type="Sign Up"><a href="{{ route('auth.register') }}">Sign Up</a>
</div>
</div>