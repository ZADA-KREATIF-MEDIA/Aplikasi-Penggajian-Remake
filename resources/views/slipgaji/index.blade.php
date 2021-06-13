@extends('layouts.app')

@section('content')
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="{{ url('home') }}">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Data Penggajian</li>
                                    </ul>
                                </div>
                                <form class="au-form-icon--sm" action="" method="post">
                                    <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                                    <button class="au-btn--submit2" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Data Penggajian 
                                {{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#largemodal"><i class="zmdi zmdi-plus"></i>tambah</button> --}}
                            </h1>
                        </div>
                    </div>
                </div>
            <hr class="line-seprate">
            </section>
            <!-- END WELCOME-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                                @if (Session::has('message'))
                                    <div class="alert alert-danger">
                                        {!! Session::get('message') !!}
                                    </div>
                                @endif
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>nip karyawan (nama)</th>
                                                <th>tanggal</th>
                                                <th>periode</th>
                                                <th>gaji bersih</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>        
                                            @forelse ($karyawan as $key => $row)
                                            
                                            <tr class="tr-shadow">
                                                <td>{!! $key+1 !!}</td>
                                                <td>{!! $row->nip !!} ({!! $row->name !!})</td>
                                                <td>{!! Carbon\Carbon::now()->format('d F Y') !!}</td>
                                                <td>{!! Carbon\Carbon::now()->format('F Y') !!}</td>
                                                <td class="desc"></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Pratinjau">
                                                            <i class="zmdi zmdi-search" data-toggle="modal" data-target="#largemodal{!!$row->id!!}"></i>
                                                        </button>
                                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Slip aji" href="{{ route('slipgaji.show', $row->id) }}">
                                                            <i class="zmdi zmdi-print"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>

                                            <!-- modal large -->
                                            <div class="modal fade" id="largemodal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="largemodalLabel">Lihat Gaji Karyawan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                
                                                        {!! Form::model($row, ['route' => ['penggajian.update', $row->id], 'method'=>'patch', 'files'=> true, 'id'=>'update'.$row->id]) !!}
                                                            @include('penggajian.form')
                                                        {!! Form::close() !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <a href="{{ route('slipgaji.show', $row->id) }}" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Slip gaji</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal large -->

                                          
                                            @empty
                                            Nodata
                                            @endforelse
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                        </div>
                    </div>
                </div>
            </section>

            

@endsection
