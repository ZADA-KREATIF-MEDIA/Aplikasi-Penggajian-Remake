

    <!DOCTYPE html>
    <html>
    <head>
        <title>Slip Gaji</title>
    </head>
    <body onload="window.print()">
        <center>
        <div class="text-center">
            {!! config('app.name') !!} 
        </div>
        </center>
    
        <hr>
        <table width="100%" border="1" style="  border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Hari Kerja</th>
                    
                        <th width="13%">Absensi</>
                        <th>Total Jam Lembur</th>
                        <th>Upah Lembur</th>
                        <th>Tunjangan Jabatan</th>
                        <th>Tunjangan Makan</th>
                        
                        <th>Gaji Kotor</th>
                        <th>Potongan Kehadiran</th>
                        <th>Gaji bersih</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_ijin=0;
                    $total_sakit=0;
                    $total_masuk=0;
                    $total_lembur=0;
                    $total_upah_lembur=0;
                    $total_tunjangan_jabatan=0;
                    $total_uang_makan=-1;
                    $total_gaji_kotor=0;
                    $total_potongan_kehadiran=0;
                    $total_gaji_bersih=0;
                    ?>

                    @foreach ($laporan as $key => $row)

                    <?php
                    
                    $upah_lembur=$lembur* $row->user->jabatan->lembur;
                    $gaji_kotor=$row->user->jabatan->gapok + $row->user->jabatan->tunjangan + ($row->user->jabatan->lembur * $lembur);
                    
                    $tunjangan_jabatan=$row->user->jabatan->tunjangan;
                    $potongan_kehadiran=$row->user->jabatan->gapok-($masuk*($row->user->jabatan->gapok/21));
                    $gaji_bersih=$gaji_kotor-$potongan_kehadiran;
                    ?>
                    
                    <tr class="tr-shadow" align="center">
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! $row->user->name !!}</td>
                        <td>{!! $row->user->jabatan->name !!}</td>
                        <td>Rp. {!! number_format($row->gapok) !!}</td>
                        <td>21</td>
                        <td>{!! $ijin !!} Ijin | {!! $sakit !!} Sakit | {!! $masuk !!} Masuk  <br></td>
                        <td>{!! $lembur !!} Jam</td>
                        <td>Rp. {!! number_format($upah_lembur) !!}</td>
                        <td>Rp. {!! number_format($tunjangan_jabatan) !!}</td>
                        <td>Rp. 10.000</td>
                        <td>Rp. {!! number_format($gaji_kotor) !!}</td>
                        <td>Rp. {!! number_format( $potongan_kehadiran) !!}</td>
                        <td>Rp. {!! number_format($gaji_bersih) !!}</td>
                    </tr>
                    <tr class="spacer"></tr>

                    <?php
                        $total_ijin=$total_ijin+=$ijin;
                        $total_sakit=$total_sakit+=$sakit;
                        $total_masuk=$total_masuk+=$masuk;
                        $total_lembur=$total_lembur+=$lembur;
                        $total_upah_lembur=$total_upah_lembur+=$upah_lembur;
                        $total_tunjangan_jabatan=$total_tunjangan_jabatan+=$tunjangan_jabatan;
                        $total_uang_makan=$total_uang_makan+=$loop->iteration;
                        $total_gaji_kotor=$total_gaji_kotor+=$gaji_kotor;
                        $total_potongan_kehadiran=$total_potongan_kehadiran+=$potongan_kehadiran;
                        $total_gaji_bersih=$total_gaji_bersih+=$gaji_bersih;
                    ?>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr align="center" style="background: #e7e7e7,font-weight:bold">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <strong>
                            {{ $total_ijin }} Ijin | {{ $total_sakit }} Sakit | {{ $total_masuk }} Masuk
                            </strong>
                        </td>
                        <td> {{ $total_lembur }} Jam</td>
                        <td>Rp. {!! number_format($total_upah_lembur) !!}</td>
                        <td>Rp. {!! number_format($total_tunjangan_jabatan) !!}</td>

                        <td>Rp. {!! number_format($total_uang_makan*10000) !!}</td>
                        <td>Rp. {!! number_format($total_gaji_kotor) !!}</td>
                        
                        <td>Rp. {!! number_format($total_potongan_kehadiran) !!}</td>
                        <td>Rp. {!! number_format($total_gaji_bersih )!!}</td>
                    </tr>
                </tfoot>
   
        </table>
    
    
    </body>
    </html>