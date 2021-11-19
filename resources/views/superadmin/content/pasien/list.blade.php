@extends('superadmin/layout/main')
@section('content')
    <a href="{{route('superadmin.pasien.add')}}" class="btn btn-sm btn-primary">Tambah data</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nama</th>

            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pasien as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>
                    <a href="{{route('superadmin.pasien.edit', $row->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-edit"></i></a>
                    <a onclick = "return confirm('Apakah Anda Yakin?')" href="{{route('superadmin.pasien.delete', $row->id)}}" data-toggle="tooltip" data-placement="top" title="Hapus data"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
