@extends('layouts.app')
@section('title','Master Data | Karyawan')
@section('master-data','menu-is-opening menu-open')
@section('lembur','active')
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
                    <h1 class="m-0">Lembur</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Lembur</li>
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
                        Data Lembur
                        <button class="btn btn-success btn-sm float-right text-uppercase" data-toggle="modal" data-target="#tambahLemburModal"><i class="fa fa-plus"></i>tambah</button>
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
                                <th>nip karyawan (nama)</th>
                                <th>tanggal</th>
                                <th>Durasi lembur</th>
                                <th>keterangan</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lembur as $key => $row)
                            <tr>
                                <td>{!! $key+1 !!}</td>
                                <td>{!! $row->user->nip !!} ({!! $row->user->name !!})</td>
                                <td> {!! $row->tanggal !!}</td>
                                <td>{!! $row->lama_lembur !!} Jam</td>
                                <td>{{ $row->keterangan }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editLemburModal{!!$row->id!!}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusLemburModal{!!$row->id!!}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>no</th>
                                <th>nip karyawan (nama)</th>
                                <th>tanggal</th>
                                <th>Durasi Lembur</th>
                                <th>keterangan</th>
                                <th>aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="tambahLemburModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lembur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'lembur.store', 'method'=>'POST', 'files'=> true, 'id'=>'store']) !!}
                    @include('lembur.form')
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();getElementById('store').submit()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    @foreach ($lembur as $key => $row)
    <div class="modal fade" id="editLemburModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largemodalLabel">Edit Lembur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::model($row, ['route' => ['lembur.update', $row->id], 'method'=>'patch', 'files'=> true, 'id'=>'update'.$row->id]) !!}
                    @include('lembur.form')
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();getElementById('update{!! $row->id !!}').submit()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusLemburModal{!!$row->id!!}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Hapus Lembur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>['lembur.destroy', $row->id], 'method'=>'delete', 'id'=>'hapus'.$row->id]) !!}
                    <p>Yakin akan menghapus data lembur {!! $row->name !!} ?</p>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();getElementById('hapus{{$row->id}}').submit();">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>



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