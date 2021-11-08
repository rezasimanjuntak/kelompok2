@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.kategori.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{$kategori->name}}" class="form-control" placeholder="Nama" required>

        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="{{$kategori->id}}">
            <input type="submit" value="simpan" class="btn btn-sm btn-primary">
        </div>
    </form>
@endsection
