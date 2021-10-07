@extends('superadmin/layout/main')
@section('content')

    <a href="{{route("superadmin.pengguna.add")}}" class="btn btn-sm btn-primary">Tambah Data</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>

        @foreach($pengguna as $row)

            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->role}}</td>
                <td>{{$row->email}}</td>
                <td>{{Helper::active($row->status)}}</td>
                <td>

                    <a onclick="return confirm('Anda Igin Edit Data ?')" href="{{route('superadmin.pengguna.edit',$row->id)}}">Edit</a>
                    <a onclick="return confirm('Apakah anda yakin?')" href="{{route('superadmin.pengguna.delete',$row->id)}}">Hapus</a>
            </tr>

        @endforeach

        </tbody>
    </table>


@endsection
