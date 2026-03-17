<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Nilai Mahasiswa</h2>
        @if (($total_nilai >= 0) and ($total_nilai < 56))
            <div class="alert alert-danger">
                Maaf, Anda Tidak Lulus
            </div>
        @elseif (($total_nilai > 55) and ($total_nilai <= 100))
            <div class="alert alert-success">
                Selamat, Anda Lulus
            </div>
    <table class="table table-bordered table-striped">
        <tr class="text-md-center">
            <th>Nama</th>
            <th>NIM</th>
            <th>Total Nilai</th>
        </tr>
        <tr>
            <td>{{ $nama }}</td>
            <td>{{ $nim }}</td>
            <td>{{ $total_nilai }}</td>
        </tr>
    </table>
    </div>
    @endif

            @switch($total_nilai)
            @case(0)
            <div class="alert alert-danger">
                Sangat Jelek
            </div>
            @break
            @case(70)
            <div class="alert alert-primary">
                Memuaskan
            </div>
            @break
            @case(100)
            <div class="alert alert-success">
                Sangat Memuaskan
            </div>
            @break
            @default
            <div class="alert alert-warning">
                Nilai Tidak Valid!
            </div>
            @endswitch

            <table class="table table-bordered table-striped">
                <tr class="text-md-center">
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Total Nilai</th>
                </tr>
                <tr>
                    <td>{{ $nama }}</td>
                    <td>{{ $nim }}</td>
                    <td>{{ $total_nilai }}</td>
                </tr>
            </table>
        </div>
              </tr>
            </table>
        </div>
 </tr>
            </table>
        </div>
    </div>
</body>

</html>