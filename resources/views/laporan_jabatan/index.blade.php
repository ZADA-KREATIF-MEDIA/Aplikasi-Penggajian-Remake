@extends('layouts.app')
@section('title','Laporan Per Jabatan')
@section('laporan','menu-is-opening menu-open')
@section('lap_penggajian_jabatan','active')
@push('addon-style')
<link rel="stylesheet" href="{{url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Per Jabatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan Penggajian</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title col-12">
                        Laporan Penggajian Perjabatan
                       
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {!! Session::get('message') !!}
                    </div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Hari Kerja</th>
                    
                        <th width="150px">Absensi</>
                        <th>Total Jam Lembur</th>
                        <th>Upah Lembur</th>
                        <th>Tunjangan Jabatan</th>
                        <th>Tunjangan Makan</th>
                        
                        <th>Gaji Kotor</th>
                        <th>Potongan Kehadiran</th>
                        <th>Gaji bersih</th>
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
                            
                            <tr>
                               
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
                            
                                <th colspan="5"> Total</th>
                              
                                <th>
                                    <strong>
                                    {{ $total_ijin }} Ijin | {{ $total_sakit }} Sakit | {{ $total_masuk }} Masuk
                                    </strong>
                                </th>
                                <th> {{ $total_lembur }} Jam</th>
                                <th>Rp. {!! number_format($total_upah_lembur) !!}</th>
                                <th>Rp. {!! number_format($total_tunjangan_jabatan) !!}</th>
        
                                <th>Rp. {!! number_format($total_uang_makan*10000) !!}</th>
                                <th>Rp. {!! number_format($total_gaji_kotor) !!}</th>
                                
                                <th>Rp. {!! number_format($total_potongan_kehadiran) !!}</th>
                                <th>Rp. {!! number_format($total_gaji_bersih )!!}</th>
                            
                        </tfoot>
                    </table>
                    <button class="btn btn-primary btn-block">
                        Keterangan : silahkan filter/cari data jabatan menggunakan search</button>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@push('addon-script')
<script src="{{url('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, 
        "lengthChange": true, 
        "autoWidth": true,
        "buttons": ["print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });

</script>

@endpush