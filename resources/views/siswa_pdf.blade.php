<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Siswa</h4>
	</center>

    <table class="table table-bordered">
        <tr>
            <th>NoReg</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>Asal Sekolah</th>
            <th>Minat Jurusan</th>
        </tr>
        @foreach ($siswas as $siswa)
        <tr>
            <td>{{ $siswa->noreg }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->jk }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>{{ $siswa->agama }}</td>
            <td>{{ $siswa->asal_sekolah }}</td>
            <td>{{ $siswa->minat_jurusan }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>