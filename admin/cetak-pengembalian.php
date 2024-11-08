<?php
// Bikin Koneksi
$c = mysqli_connect('localhost', 'root', '', 'db_perpustakaan');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Pengembalian Buku</title>
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
    <h3 class="text-center"><strong>Laporan Riwayat Peminjaman</strong></h3>
    <h4 class="text-center">PERPUSTAKAAN POLITEKNIK NEGERI PADANG</h4>
        <?php
        include '../koneksi.php';

        $query = "SELECT * FROM trans_pinjam WHERE status='kembali'";
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
                        <th>ISSN</th>
                        <th>ID Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM trans_pinjam WHERE status='kembali'";
                    $result = $c->query($query);
                    $i = 1;

                    while ($p = mysqli_fetch_array($result)) {
                        $issn = $p['issn'];
                        $id_anggota = $p['id_anggota'];
                        $tgl_pinjam = $p['tgl_pinjam'];
                        $tgl_kembali = $p['tgl_kembali'];
                        $status = $p['status'];
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $issn; ?></td>
                            <td><?= $id_anggota; ?></td>
                            <td><?= $tgl_pinjam; ?></td>
                            <td><?= $tgl_kembali; ?></td>
                            <td><?= $status; ?></td>
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
                            <label for="signature">Pustakawan</label>
                            <br>
                            <label for="signature">ID Pustakawan</label>
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
