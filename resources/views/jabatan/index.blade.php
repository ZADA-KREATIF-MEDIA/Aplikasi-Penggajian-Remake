@extends('layouts.app')
@section('title','Master Data | Jabatan')
@section('master-data','menu-is-opening menu-open')
@section('jabatan','active')
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
                    <h1 class="m-0">Jabatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Jabatan</li>
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
                       
                        Data Jabatan
                        <button class="btn btn-success btn-sm float-right text-uppercase" data-toggle="modal" data-target="#tambahJabatanModal"><i class="fa fa-plus"></i>tambah</button>
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
                                <th>No</th>
                                <th>nama jabatan</th>
                                <th>gaji pokok</th>
                                <th>tunjangan Jabatan</th>
                                <th>lembur (per jam)</th>
                                <th>tunjangan Makan</th>
                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $key => $row)
                            <tr>
                                <td>{!! $key+1 !!}</td>
                                <td>{!! $row->name !!}</td>
                                <td>Rp. {!! number_format($row->gapok) !!}</td>
                                <td>Rp. {!! number_format($row->tunjangan) !!}</td>
                                <td>Rp. {!! number_format($row->lembur) !!}</td>
                                <td>Rp. 10,000</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editJabatanModal{!!$row->id!!}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusJabatanModal{!!$row->id!!}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>nama jabatan</th>
                                <th>gaji pokok</th>
                                <th>tunjangan</th>
                                <th>lembur (per jam)</th>
                                <th>tunjangan Makan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <button class="btn btn-primary disabled">KET : UANG MAKAN IDR 10.000</button>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="tambahJabatanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'jabatan.store', 'method'=>'POST', 'files'=> true, 'id'=>'store']) !!}
                    @include('jabatan.form')
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();getElementById('store').submit()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    @foreach ($jabatan as $key => $row)
    <div class="modal fade" id="editJabatanModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largemodalLabel">Edit Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::model($row, ['route' => ['jabatan.update', $row->id], 'method'=>'patch', 'files'=> true, 'id'=>'update'.$row->id]) !!}
                    @include('jabatan.form')
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();getElementById('update{!! $row->id !!}').submit()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusJabatanModal{!!$row->id!!}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Hapus Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>['jabatan.destroy', $row->id], 'method'=>'delete', 'id'=>'hapus'.$row->id]) !!}
                    <p>Yakin akan menghapus jabatan {!! $row->name !!} ?</p>
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