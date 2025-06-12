@extends('base')
@section('title', 'Registration')

<div>
    <h2>Create New Account</h2>

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

    <form method="post" action="{{ route('auth.userRegister')}}">
        @csrf
        <div>
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="{{ old('fname') }}" placeholder="Enter First Name">
            @error('fname')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="{{ old('lname') }}" placeholder="Enter Last Name">
            @error('lname')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label>Email Address:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email Address">
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label>Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password">
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label>Verify Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
            @error('password_confirmation')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Register</button>
    </form>

    <div>
        <a href="{{ route('auth.index') }}">Go back to Login</a>
    </div>
</div>