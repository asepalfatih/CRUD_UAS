<?php

require_once __DIR__ . '/vendor/autoload.php';

require('function.php');
$mahasiswa = query("SELECT * FROM data_mahasiswa");

$mdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Daftar Mahasiswa</title>
    </head>
    <body>
    <h1>Dafatar MAhasiswa</h1>
    
    <table border = "1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</tr>
        <th>NIM</tr>
        <th>Nama</tr>
        <th>Kelas</tr>
        <th>Usia</tr>
    </tr>';

    $i = 1;
    foreach($mahasiswa as $mhs){
    $html .= '<tr>
            <td>' . $i++ . ' </td>
            <td>' . $mhs["NIM"] . '</td>
            <td>' . $mhs["Nama"] . '</td>
            <td>' . $mhs["Kelas"] . '</td>
            <td>' . $mhs["Usia"] . '</td>
        </tr>';
    }

$html .= '
            </table>
            </body>
            </html>';

$mdf->WriteHTML($html);
$mdf->Output('daftar-mahasiswa.pdf','I');

?>