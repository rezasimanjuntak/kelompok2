@extends('superadmin/layout/main')
@section('content')

    <form action="{{route('superadmin.pengguna.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label >Name</label>
            <input type="text" name="name" class="form-control"placeholder="Nama" required>
        </div>

        <div class="form-group">
            <label >Email</label>
            <input type="email" name="email" class="form-control"placeholder="Email" required>
        </div>

        <div class="form-group">
            <label >Role</label>
           <select name="role" class "form-control" required>
            <option value="admin">Admin</option>
            <option value="sa">Super Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label >Gambar</label>
            <input type="file" name="image" accept="image/png,image/jpeg,image/jpg" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Simpan" @class="btn btn-sm btn-primary">
        </div>

    </form>

@endsection

