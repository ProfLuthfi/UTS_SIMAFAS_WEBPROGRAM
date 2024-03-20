<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Fasilitas</title>
    <style>
        /* Gaya CSS untuk laporan PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        table th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <h2>Laporan Fasilitas</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Fasilitas</th>
                <th>Alamat</th>
                <th>PJ Fasilitas</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fasilitas as $index => $fasilita)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $fasilita->nama_fasilitas }}</td>
                <td>{{ $fasilita->alamat }}</td>
                <td>{{ $fasilita->Pj_fasilitas }}</td>
                <td>{{ $fasilita->kondisi?->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
