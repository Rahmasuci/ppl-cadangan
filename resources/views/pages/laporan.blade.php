<!DOCTYPE html>
<html>
<head>
  <title>Laporan Bulanan</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Pelanggan</th>
        <th>Alamat Pengiriman</th>
        <th>Produk</th>
        <th>Kuantitas</th>
        <th>Harga Total</th>
        <th>Tgl Pesan</th>
        <th>Tgl Selesai</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($order as $o)
      <tr>
        <td>{{ $o->pelanggan->nama }}</td>
        <td>{{ $o->alamat_pengiriman }}</td>
        @foreach ($o->orderdetail as $od)
          <td>{{ $od->product->nama_produk }}</td>
          <td>{{ $od->kuantitas }}</td>
          <td>{{ $od->total }}</td>
        @endforeach
        <td>{{ $o->created_at}}</td>
        <td>{{ $o->tgl_selesai}}</td>
        <td>{{ $o->status}}</td>
      </tr>
      @endforeach
    </tbody>

  </table>

<h1>kdfjhfjhfjhsfjhd</h1>
<h4>sjkjfdjkfd</h4>
<h6>nsdndsms</h6>
</body>
</html>