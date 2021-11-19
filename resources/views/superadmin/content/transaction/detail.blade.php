@extends('superadmin/layout/main')
@section('content')

    @php
     $total =0;
    @endphp


    <label>Id: {{$transaction->id}}</label><br/>
    <label>Tanggal: {{$transaction->date}}</label><br/>
    <label>Pembeli: {{$transaction->name}}</label>


    <p></p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Produl</th>
            <th scope="col">Harga satuan</th>
            <th scope="col">Banyaknya</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($item as $row)
            @php
                $total +=$row->product_price;
            @endphp

            <tr>
                <td>{{$row->product_name}}</td>
                <td>{{Helper::rupiah($row->product_price)}}</td>
                <td>{{$row->qty}}</td>
                <td>{{Helper::rupiah($row->price)}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <label>Total Bayar: {{$total}}</label><br/>
    <a href="{{route('superadmin.transaction.index')}}"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection
