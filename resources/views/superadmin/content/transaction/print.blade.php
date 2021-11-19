

    @php
     $total =0;
    @endphp


    <label>Transaksi Id: {{$transaction->id}}</label><br/>
    <label>Tanggal: {{$transaction->date}}</label><br/>
    <label>Pasien: {{$transaction->name}}</label>


    <p></p>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th >Harga satuan</th>
            <th >Banyaknya</th>
            <th >Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @php
        $no=1;
        @endphp

        @foreach($item as $row)
            @php
                $total +=$row->product_price;
            @endphp

            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->product_name}}</td>
                <td>{{Helper::rupiah($row->product_price)}}</td>
                <td>{{$row->qty}}</td>
                <td>{{Helper::rupiah($row->price)}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <label>Total Bayar: {{Helper::rupiah($total)}}</label><br/>


