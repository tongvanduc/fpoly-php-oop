@extends('layouts.master')

@section('title')
    Cập nhật người dùng: {{ $user['name'] }}
@endsection

@section('content') <h1>Cập nhật người dùng: {{ $user['name'] }}
    </h1>

    @if (!empty($_SESSION['errors']))
        <div class="alert alert-warning">
            <ul>
                @foreach ($_SESSION['errors'] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            @php
                unset($_SESSION['errors']);
            @endphp
        </div>
    @endif

    @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-success">
            {{ $_SESSION['msg'] }}
        </div>

        @php
            unset($_SESSION['status']);
            unset($_SESSION['msg']);
        @endphp
    @endif

    <form action="{{ url("admin/users/{$user['id']}/update") }}" enctype="multipart/form-data" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $user['name'] }}"
                name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user['email'] }}"
                name="email">
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label">Type:</label>

            <input type="radio" class="form-radio" id="type_admin" value="admin"
                @if ($user['type'] == 'admin') checked @endif name="type">

            <label for="type_admin" class="form-label">Admin</label>

            <input type="radio" class="form-radio" id="type_member" value="member"
                @if ($user['type'] == 'member') checked @endif name="type">

            <label for="type_member" class="form-label">Member</label>
        </div>

        <div class="mb-3 mt-3">
            <label for="avatar" class="form-label">Avatar:</label>
            <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
            <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
        </div>
        <div class="mb-3 mt-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
