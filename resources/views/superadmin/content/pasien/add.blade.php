@extends('superadmin/layout/main')
@section('content')
    <form action="{{route('superadmin.pasien.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name"  class="form-control" placeholder="Nama" required>

        </div>
        <div class="form-group">

            <input type="submit" value="simpan" class="btn btn-sm btn-primary">
        </div>
    </form>
@endsection
