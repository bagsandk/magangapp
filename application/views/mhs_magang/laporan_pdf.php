<?php
$path = base_url('./assets/img/dcc.png');
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// var_dump($form);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" /> -->

    <!-- Custom styles for this template-->
    <!-- <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <title>Document</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table style="width: 100%;" border="1">
        <tr>
            <th rowspan="2" style="text-align: center; padding:0px">
                <img src="<?= $base64 ?>" width="65" height="65" />
            </th>
            <th rowspan="2" style="text-align: center; padding-top:0px">
                <p style="font-size: 18; margin-top:0px; margin-bottom:0px">Formulir</p>
                <p style="font-size: 14 ;margin-top:0px; margin-bottom:0px">Penilaian Lapangan Praktek</p>
                <p style="font-size: 14;margin-top:0px;margin-bottom:0px">Kerja Lapangan</p>
            </th>
            <td>
                <center>
                    <small style="text-align: center;">Diploma Tiga</small>
                </center>
                <small style="padding-left: 0px; margin-top:5px">Program Studi : Manajemen Informatika</small>
            </td>
        <tr>
            <th><b>FORM PKL-04</b></th>
        </tr>
        </tr>
    </table>
    <br>
    <p>Nama : <?= $form['nama'] ?> </p>
    <p>NPM : <?= $form['npm'] ?></p>
    <p>Lokasi PKL : PTPN7, Bagian <?= $form['nama_bagian'] ?></p>
    <br>
    <table style="width: 100%;" border="1">
        <tr style="background-color: grey;">
            <th style="padding: 4;">NO</th>
            <th>JENIS DAN AKTIVITAS YANG DINILAI</th>
            <th>NILAI</th>
        </tr>
        <tr>
            <td style="text-align:center; padding:4;">1</td>
            <td>Kedisiplinan</td>
            <td style="text-align:center;"><?= $form['n_kedis'] ?></td>
        </tr>
        <tr>
            <td style="text-align:center; padding:4;">2</td>
            <td>Keaktifan</td>
            <td style="text-align:center;"><?= $form['n_keakt'] ?></td>
        </tr>
        <tr>
            <td style="text-align:center; padding:4;">3</td>
            <td>Motivasi dan Kreatifitas</td>
            <td style="text-align:center;"><?= $form['n_motiv'] ?></td>
        </tr>
        <tr>
            <td style="text-align:center; padding:4;">4</td>
            <td>Kemampuan Kerja</td>
            <td style="text-align:center;"><?= $form['n_kemam'] ?></td>
        </tr>
        <tr>
            <td style="text-align:center; padding:4;">5</td>
            <td>Kerjasama</td>
            <td style="text-align:center;"><?= $form['n_kerja'] ?></td>
        </tr>
        <tr>
            <td style="text-align:center; padding:4;">6</td>
            <td>Kesopanan</td>
            <td style="text-align:center;"><?= $form['n_kesop'] ?></td>
        </tr>
        <tr>
            <td style="text-align:center; padding:4;">7</td>
            <td>Jumlah Kehadiran</td>
            <td style="text-align:center;"><?= $form['n_kehad'] ?></td>
        </tr>
        <tr>
            <td style="text-align:center; padding:4;">8</td>
            <td>Kerapihan</td>
            <td style="text-align:center;"><?= $form['n_kerap'] ?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right; padding:4;">Jumlah</td>
            <td style="text-align:center;"><?= $sum; ?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right; padding:4;">Rata-rata</td>
            <td style="text-align:center;"><?= $av; ?></td>
        </tr>

    </table>
    <br>
    <br>
    <br>
    <div style="display: table;">
        <div style="float: left; width: 50%;padding: 10px;height: 300px">
            <i>Keterangan:</i>
            <br>
            <table border="1">
                <tr style="background-color: grey;">
                    <th>Predikat</th>
                    <th>Range Nilai</th>
                </tr>
                <tr>
                    <td>Sangat Baik</td>
                    <td>81-100</td>
                </tr>
                <tr>
                    <td>Baik</td>
                    <td>71-80</td>
                </tr>
                <tr>
                    <td>Cukup</td>
                    <td>61-70</td>
                </tr>
                <tr>
                    <td>Kurang</td>
                    <td>0-60</td>
                </tr>
            </table>
        </div>
        <div style=" float: right;width: 50%;padding: 10px;height: 300px">
            <p style="margin-top:0px; margin-bottom:0px">Bandar Lampung. </p>
            <p style="margin-top:0px; margin-bottom:0px">Pembimbing lapangan</p>
            <p style="margin-top:0px; margin-bottom:0px">Tanda tangan & Cap Perusahan/Instansi/Institusi</p>
            <br>
            <br>
            <br>
            <p style="margin-top:0px; margin-bottom:0px">(<?= $form['nama_pegawai'] ?> )</p>
        </div>
    </div>



    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>
</body>

</html>