@extends('base')
@section('title', 'Students Dashboard')

<div style="text-align:right;">
    <a href="{{ route('auth.logout') }}">Logout</a>
</div>


@if(Session("success"))
        <div>
            {{ session('success') }}
        </div>
    @endif


<div>
    <h2>Student's Records</h2>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search Student's Name">
        <button type="submit">Search Student</button>
        <button type="button" onclick="document.getElementById('addNewModal').style.display='block'">
            Add New Student
        </button>
    </form>


    <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse; margin-top:18px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $std)
            <tr>
                <td>{{ $std->id }}</td>
                <td>
                    {{ $std->fname }}{{ $std->mname ? ' ' . strtoupper(substr($std->mname,0,1)).'.' : '' }} {{ $std->lname }}
                </td>
                <td>{{ $std->age }}</td>
                <td>{{ $std->sex }}</td>
                <td>
                    <a href="{{ route('std.updateView', $std->id) }}">Edit</a>
                    <a href="{{ route('std.studentDelete', $std->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div id="addNewModal" style="display:none; position:fixed; left:0; top:0; width:100vw; height:100vh; background:#0002;">
    <div style="background:#fff; margin:60px auto; padding:20px; width:300px; border:1px solid #333;">
        <div>
            <strong>Create New Student</strong>
            <button style="float:right;" onclick="document.getElementById('addNewModal').style.display='none'">X</button>
        </div>
        <form method="post" action="{{ route('std.addNewStudent') }}">
            @csrf
            <div>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="{{ old('fname') }}" placeholder="Enter First Name">
                @error('fname')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="mname">Middle Name:</label>
                <input type="text" id="mname" name="mname" value="{{ old('mname') }}" placeholder="Enter Middle Name">
                @error('mname')
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
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" value="{{ old('age') }}" placeholder="Enter Age">
                @error('age')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="sex">Sex:</label>
                <input type="text" id="sex" name="sex" value="{{ old('sex') }}" placeholder="Enter Sex">
                @error('sex')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</div>
