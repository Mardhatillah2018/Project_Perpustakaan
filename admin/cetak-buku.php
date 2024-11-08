<?php
// Bikin Koneksi
$c = mysqli_connect('localhost', 'root', '', 'db_perpustakaan');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Data Buku</title>
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
    <h3 class="text-center"><strong>Laporan Data Buku</strong></h3>
    <h4 class="text-center">PERPUSTAKAAN POLITEKNIK NEGERI PADANG</h4>
        <?php
        include '../koneksi.php';

        $query = "SELECT * FROM data_buku INNER JOIN kategori ON data_buku.kategori_id=kategori.id
        INNER JOIN pengarang ON data_buku.pengarang_id = pengarang.id
        INNER JOIN penerbit ON data_buku.penerbit_id = penerbit.id ORDER BY issn";
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
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Asal</th>
                        <th>Tanggal Input</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM data_buku INNER JOIN kategori ON data_buku.kategori_id=kategori.id
                    INNER JOIN pengarang ON data_buku.pengarang_id = pengarang.id
                    INNER JOIN penerbit ON data_buku.penerbit_id = penerbit.id ORDER BY issn";
                    $result = $c->query($query);
                    $i = 1;

                    while ($p = mysqli_fetch_array($result)) {
                        $issn = $p['issn'];
                        $judul = $p['judul'];
                        $pengarang = $p['nama_pengarang'];
                        $penerbit = $p['nama_penerbit'];
                        $thn_terbit = $p['thn_terbit'];
                        $kategori = $p['nama_kategori'];
                        $jumlah = $p['jumlah'];
                        $asal = $p['asal'];
                        $tgl_input = $p['tgl_input'];
                        ?>
                        <tr>
                        <td><?= $i++; ?></td>
                            <td><?= $issn; ?></td>
                            <td><?= $judul; ?></td>
                            <td><?= $pengarang; ?></td>
                            <td><?= $penerbit; ?></td>
                            <td><?= $thn_terbit; ?></td>
                            <td><?= $kategori; ?></td>
                            <td><?= $jumlah; ?></td>
                            <td><?= $asal; ?></td>
                            <td><?= $tgl_input; ?></td>
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
                            <label for="signature">ID User</label>
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
