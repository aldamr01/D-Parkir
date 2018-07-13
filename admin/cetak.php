<?php
require_once "../function/init.php";

if(isset($_POST['tanggal'])){
  $tglAwal   = $_POST['mulai'];
  $tglAkhir   = $_POST['sampai'];
  $print1 = date_create($tglAwal);
  $print1 = date_format($print1,"d-m-Y");
  $print2 = date_create($tglAkhir);
  $print2 = date_format($print2,"d-m-Y");

$html='
  <html>
  <head>
    <title>s</title>
  </head>
  <body>
      <table style=" margin-right:0px;margin-bottom:10px; width:100%;">
        <tr style="margin-top:0">
          <td style="width:20%"><img src="print/untag.png" alt="" style="height: 150px; width: 150px ;margin-top:0px;margin-botom:10px;"></td>
          <td style="width:100%; padding-left:2%;padding-right:0;">
            <h3 style="text-align: center; margin-top:0;padding:0; margin-bottom:5px; font-size:20px"><strong>UNIVERSITAS 17 AGUSTUS 1945 (UNTAG) SURABAYA</strong></h3>
            <h3 style="text-align: center;margin-top:-15px;padding:0; margin-bottom:5px; font-size:22px; font-style:bold"><strong>FAKULTAS TEKNIK</strong></h3>
            <p style="text-align: center; margin-top:-15px;padding:0; margin-bottom:5px; font-size:14px"><strong>Kampus</strong> : Jl. Semolowaru 45 Surabaya 60118. <strong>Telp</strong> : 031-5931800, <strong>Fax</strong> : 031-5927817 s</p>

            <table style="margin-left:25px;margin-top:5px;">
                <tr>
                  <td style="font-size:12px; padding:0;">-Program Studi Teknik Industri</td>
                  <td style="padding-right:100px;;padding-bottom:0;;padding-top:0;"></td>
                  <td style="font-size:12px;padding:0;">-Program Studi Teknik Arsitektur</td>
                </tr>
                <tr>
                  <td style="font-size:12px;padding:0; ">-Program Studi Teknik Sipil</td>
                  <td style="padding:0;"></td>
                  <td style="font-size:12px;padding:0;">-Program Studi Teknik Informatika</td>
                </tr>
                <tr>
                  <td style="font-size:12px;padding:0;">-Program Studi Teknik Elektro</td>
                  <td></td>
                  <td style="font-size:12px;padding:0;">-Program Studi Magister Teknik Sipil</td>
                </tr>
                <tr>
                  <td style="font-size:12px;padding:0;">-Program Studi Teknik Mesin</td>
                  <td></td>
                  <td></td>
                </tr>
            </table>
          </td>
        </tr>
      </table>
    <hr class="" style="border-width:medium;background:black;margin-top:0px;margin-bottom:3px;"><hr style="background:black;margin-top:0px;"><br>
    <h4 align="center" style="font-size:16pt;font-style:bold;margin-bottom:0px;"><strong><u>LAPORAN LEGALISIR</u></strong></h4>
    <h4 align="center" style="font-size:12pt;margin-top:0px;">tanggal : '.$print1.' s/d '.$print2.'</h4>
    <br>
    <table width="100%" border="1" style="border-collapse:collapse">
      <tr>
        <td align="center">Tanggal</td>
        <td align="center">Jml. Mobil perhari</td>
        <td align="center">Total harian</td>
      </tr>';

      $date1 = date_create($tglAwal);
      $date2 = date_create($tglAkhir);
      //$date1 = DateTime::createFromFormat("Y-m-d", $tglAwal);
    //  $date1 = $date1->format('Y-m-d');
      $harga = 5000;
      $arr1 = explode('-',$tglAwal);
      $arr2 = explode('-',$tglAkhir);
      $total =0;

      $diff = gregoriantojd($arr2[1], $arr2[2], $arr2[0])- gregoriantojd($arr1[1], $arr1[2], $arr1[0]);
      for($k=0;$k<=$diff;$k++){
          $xmin =date_format($date1,"d-m-Y");
          $xmax =date_format($date2,"d-m-Y");
          $ambil   = print_laporan ($xmin,$xmax);
          $datax["ijazah"]   =0;
          $datax["transkip"] =0;
          $datax["tgl"]=date_format($date1,"d-m-Y");
          while ($cetak = mysqli_fetch_assoc($ambil)) {
            $datax['ijazah'] = $datax['ijazah'] +$cetak['val'] ;
          }$html .='
            <tr>
              <td align="center">'.$datax['tgl'].'</td>
              <td align="center">'.$datax['ijazah'].'</td>

              <td align="center">Rp.'.$harga*($datax['ijazah']).',-</td>
            </tr>'; date_add($date1, date_interval_create_from_date_string('1 days'));$total=$total+($datax['ijazah']);}$html .='
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Total :</td>
        <td style="border:0"></td>
        <td align="center">Rp.'.$total*5000;',-</td>
      </tr>
    </table>
  </body>
  </html>';

  require_once("dompdf/dompdf_config.inc.php");
  $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  $dompdf->render();
  $dompdf->stream('laporan_legalisir.pdf');
}else{

 } ?>
