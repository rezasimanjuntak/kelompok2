@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.pasien.update')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{$pasien->name}}" class="form-control" placeholder="Nama" required>

        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="{{$pasien->id}}">
            <input type="submit" value="simpan" class="btn btn-sm btn-primary">
        </div>
    </form>
@endsection
