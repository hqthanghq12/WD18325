@extends('layout.main')
@section('content')
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span>{{$_SESSION['success']}}</span>
    @endif
    <a href="{{route('add-teacher')}}">Thêm giảng viên</a>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>
        <th>School</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($teachers as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->salary }}</td>
                <td>{{ $c->school }}</td>
                <th>
                    <a href="">Sửa</a>
                    <button onclick="confirmDelete('{{route('delete-teacher/'.$c->id)}}')">Xóa</button>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
