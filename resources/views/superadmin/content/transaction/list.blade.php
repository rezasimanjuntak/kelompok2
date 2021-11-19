@extends('superadmin/layout/main')
@section('content')
<a href="{{route('superadmin.transaction.add')}}" class="btn btn-sm btn-primary">Tambah Trans</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Pembeli</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaction as $row)
            <tr>
                <td>{{$row->date}}</td>
                <td>{{$row->name}}</td>
                <td>
                    <a href="{{route('superadmin.transaction.detail',$row->id)}}" data-toggle="tooltip" data-placement="top" title="View Detail"><i class="fa fa-eye"></i></a>
                    <a href="{{route('superadmin.transaction.print',$row->id)}}" data-toggle="tooltip" data-placement="top" title="Print Detail"><i class="fa fa-print"></i></a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
