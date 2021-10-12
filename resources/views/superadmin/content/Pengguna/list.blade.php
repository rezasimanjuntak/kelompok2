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
            <th scope="col">Gambar</th>
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
                    <a href="{{route('storage_file',$row->image)}}" target="_blank">{{route('storage_file',$row->image)}}</a>
                </td>
                <td>

                    <a href="{{route('superadmin.pengguna.edit',$row->id)}}"data-toggle="tooltip" data-placement="top" title="Edit data"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Apakah anda yakin?')" href="{{route('superadmin.pengguna.delete',$row->id)}}"data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fa fa-trash"></i></a>
                    <a href="{{route('download_file',$row->image)}}"data-toggle="tooltip" data-placement="top" title="Downlaod file"><i class="fa fa-download"></i></a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>


@endsection
