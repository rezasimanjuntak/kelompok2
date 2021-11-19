@extends('superadmin/layout/main')
@section('content')

    <div class="row">

        <div class="col-lg-4">
            <h3>Daftar obat</h3>
            <table class="table" id="productTable">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $row)
                    <tr>
                        <td class="product_id">{{$row->id}}</td>
                        <td class="product_name">{{$row->name}}</td>
                        <td class="product_price">{{$row->price}}</td>
                        <td>
                           <a href="#" class="addToCart">Tambah</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-8">
            <form action="{{route('superadmin.transaction.store')}}"method="post">
                @csrf
                <h3> Pasien</h3>
                <div class="form-group">

                    <select name="pasien_id" class="form-control">
                        @foreach($pasien as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                    <div/>
                    <p>&nbsp;</p>
                    <h3>Daftar Pembelian Obat</h3>
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Harga</th>
                            <th scope="col">qty</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <input type="submit" value="Simpan Transaksi">
            </form>

            </div>
    </div>
    <script>
       $(function (){
           delInit();
           var product_id = "";
           var product_name = "";
           var product_price = "";

           $('#productTable').on("click",".addToCart",function (){
              product_id = $(this).closest('tr').find('.product_id').text();
              product_name = $(this).closest('tr').find('.product_name').text();
              product_price = $(this).closest('tr').find('.product_price').text();


              var rowCount = $('#myTable tbody tr').length;
              var markup = "<tr>";
              markup += "<td>"+product_name+"</td>";
              markup += "<td>"+product_price+"</td>";

              markup += "<td>";
              markup += "<input type='number' name='send["+(rowCount+1)+"][product_qty]' value='1'>";
              markup += "<input type='hidden' name='send["+(rowCount+1)+"][product_id]' value="+product_id+">";
              markup += "</td>";

              markup += "<td><button type='button' class='delete-row'> Hapus</button> </td>";
               markup +="</tr>";

               $('#myTable tbody ').append(markup);
               delInit();
           });

           function delInit(){
               $(".delete-row").click(function () {
                   $(this).parent().parent().remove();
               })
           }

       });
        </script>


@endsection
