@extends('base')
@section('title', 'Update Student')

<div style="max-width:400px; margin:40px auto;">
    @foreach($students as $std)
    <form method="post" action="{{ route('std.studentUpdate') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $std->id }}">

        <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse;">
            <tr>
                <td><label for="fname">First Name</label></td>
                <td>
                    <input type="text" id="fname" name="fname" value="{{ $std->fname }}" placeholder="Enter first name" style="width:100%;">
                </td>
            </tr>
                <td><label for="mname">Middle Name</label></td>
                <td>
                    <input type="text" id="mname" name="mname" value="{{ $std->mname }}" placeholder="Enter middle name" style="width:100%;">
                </td>
            <tr>
                <td><label for="lname">Last Name</label></td>
                <td>
                    <input type="text" id="lname" name="lname" value="{{ $std->lname }}" placeholder="Enter last name" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td><label for="age">Age</label></td>
                <td>
                    <input type="text" id="age" name="age" value="{{ $std->age }}" placeholder="Enter age" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td><label for="sex">Sex</label></td>
                <td>
                    <input type="text" id="sex" name="sex" value="{{ $std->sex }}" placeholder="Enter Sex" style="width:100%;">
                </td>
            </tr>
        </table>

        <div style="margin-top:18px;">
            <button type="submit">Update</button>
        </div>
    </form>
    @endforeach

    <div style="margin-top:18px;">
        <a href="{{ route('std.myView') }}">Back to Home</a>
    </div>
</div>