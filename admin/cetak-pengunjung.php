<?php
// Bikin Koneksi
$c = mysqli_connect('localhost', 'root', '', 'db_perpustakaan');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Pengunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header {
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        form {
            margin-top: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,th,td {
            border: 1px solid #ddd;
        }

        th,td {
            padding: 8px;
            text-align: center;
        }

        #signature-form {
            margin-top: 80px;
            text-align: center;
        }

        #signature-canvas {
            border: 2px solid #ddd;
        }

        .signature {
            margin-left: 780px;
        }
        th {
                background-color: #f2f2f2;
            }
    </style>
</head>

<body>
    <header style="text-align:center;">
    <img src="images/kop.jpg" alt="Header Image"></br>
    <h3 class="text-center"><strong>Laporan Pengunjung</strong></h3>
    <h4 class="text-center">PERPUSTAKAAN POLITEKNIK NEGERI PADANG</h4>
        <?php
        include '../koneksi.php';

        $query = "SELECT * FROM pengunjung ORDER BY tgl_kunjung";
        $result = $c->query($query);

        $item = mysqli_fetch_assoc($result);
        ?>
    </header>
    <hr>
    <section>
        <div class="table-responsive">
            <table border="1" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Keperluan</th>
                        <th>Saran</th>
                        <th>Tanggal Kunjung</th>
                        <th>Jam Kunjung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM pengunjung ORDER BY tgl_kunjung";
                    $result = $c->query($query);
                    $i = 1;

                    while ($p = mysqli_fetch_array($result)) {
                        $nama = $p['nama'];
                        $email = $p['email'];
                        $perlu = $p['perlu'];
                        $saran = $p['saran'];
                        $tgl_kunjung = $p['tgl_kunjung'];
                        $jam_kunjung = $p['jam_kunjung'];
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= $email; ?></td>
                            <td><?= $perlu; ?></td>
                            <td><?= $saran; ?></td>
                            <td><?= $tgl_kunjung; ?></td>
                            <td><?= $jam_kunjung; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <form id="signature-form">
                    <div class="signature">
                        <div class="col-12">
                            <label for="signature">Padang, </label></br>
                            <canvas id="signature-canvas" width="300" height="100"></canvas></br>
                            <label for="signature">Admin/Pustakawan</label>
                            <br>
                            <label for="signature">ID Admin/Pustakawan</label>
                        </div>
                    </div>
                    <!-- Tambahkan script JavaScript untuk menangani tanda tangan di sini -->
                    <script>
                        function printReport() {
                            // Cetak laporan secara otomatis
                            window.print();
                        }
                        // Panggil fungsi cetak saat halaman dimuat
                        printReport();
                    </script>

                    <!-- Tambahkan link JS Bootstrap di sini -->
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </form>
        </div>
    </section>
    <script>
        window.print();
    </script>
</body>

</html>
