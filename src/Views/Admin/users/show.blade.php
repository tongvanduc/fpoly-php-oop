@extends('layouts.master')

@section('title')
    Chi tiết người dùng: {{ $user['name'] }}
@endsection

@section('content')
    <h1>Chi tiết người dùng: {{ $user['name'] }}</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Trường</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($user as $field => $value)
                <tr>
                    <td>{{ $field }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
