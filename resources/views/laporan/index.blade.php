@extends('layouts.app')
@section('title','Laporan | Laporan Penggajian')
@section('laporan','menu-is-opening menu-open')
@section('lap_penggajian','active')
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
                    <h1 class="m-0">Laporan Penggajian</h1>
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
                        Laporan Penggajian
                        <form action="{{ route('laporan.create') }}" method="get" class="float-right">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" class="">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="">
                            <input type="submit" value="Cetak">
                        </form>
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
                                <th>no</th>
                                <th>name</th>
                                <th>tanggal</th>
                                <th>gaji bersih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $key => $row)
                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>{!! $row->user->name !!}</td>
                                <td>{!! $row->created_at !!}</td>
                                <td>{!! number_format($row->gaji_bersih) !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>no</th>
                                <th>name</th>
                                <th>tanggal</th>
                                <th>gaji bersih</th>
                            </tr>
                        </tfoot>
                    </table>
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
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    
</script>

@endpush