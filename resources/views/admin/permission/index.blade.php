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
                                            <a href="{{ url('home') }}">Admin</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Roles & Permission</li>
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

            <!-- PAGE CONTENT-->
            <div class="page-container3">
                <section class="alert-wrap p-b-30">
                    <div class="container">
                        <!-- ALERT-->
                        @if(Session::has('message'))
                            <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
                                <i class="zmdi zmdi-check-circle"></i>
                                <span class="content">{!! Session::get('message') !!}</span>
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">
                                        <i class="zmdi zmdi-close-circle"></i>
                                    </span>
                                </button>
                            </div>
                        @endif
                        
                        <!-- END ALERT-->
                    </div>
                </section>
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3">
                                <!-- MENU SIDEBAR-->
                                @include('admin.layouts.sidebar', ['linkpermission' => 'active'])
                                <!-- END MENU SIDEBAR-->
                            </div>
                            <div class="col-xl-9">
                                <!-- PAGE CONTENT-->
                                <div class="page-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- RECENT REPORT-->
                                            <div class="user-data m-b-30">
                                                <h3 class="title-3 m-b-30">
                                                    <i class="fas fa-chart-bar"></i>Permission <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#largemodal"><i class="zmdi zmdi-plus"></i>tambah</a></h3>
                                                <div class="table-responsive table-data">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <td>id</td>
                                                                <td>name</td>
                                                                <td></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($permission as $key => $row)
                                                            <tr>
                                                                <td>{!! $key+1 !!}</td>
                                                                <td>
                                                                    <div class="table-data__info">
                                                                        <h6>{!! $row->name !!}</h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="more" data-toggle="modal" data-target="#largemodal{!!$row->id!!}">
                                                                        <i class="zmdi zmdi-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                                                    </span>
                                                                    <span class="more" data-toggle="modal" data-target="#staticModal{!!$row->id!!}">
                                                                        <i class="zmdi zmdi-delete" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                                                                    </span>
                                                                </td>
                                                            </tr>

                                                            <!-- modal large -->
                                                            <div class="modal fade" id="largemodal{!!$row->id!!}" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="largemodalLabel">Edit Permission</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        {!! Form::model($row, ['route' => ['permissions.update', $row->id], 'method'=>'patch', 'id'=>'update'.$row->id]) !!}
                                                                            @include('admin.permission.form')
                                                                        {!! Form::close() !!}
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="button" class="btn btn-primary" onclick="event.preventDefault();getElementById('update{!! $row->id !!}').submit()">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end modal large -->

                                                            <!-- modal static -->
                                                            <div class="modal fade" id="staticModal{!!$row->id!!}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
                                                             data-backdrop="static">
                                                                <div class="modal-dialog modal-sm" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticModalLabel">Hapus Role</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {!! Form::open(['route'=>['permissions.destroy', $row->id], 'method'=>'delete', 'id'=>'hapus'.$row->id]) !!}
                                                                            <p>Yakin akan menghapus permission {!! $row->name !!} ?</p>
                                                                            {!! Form::close() !!}
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="button" class="btn btn-primary" onclick="event.preventDefault();getElementById('hapus{{$row->id}}').submit();">Confirm</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end modal static -->

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END RECENT REPORT-->
                                        </div>
                                    </div>
                                </div>
                                <!-- END PAGE CONTENT-->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- END PAGE CONTENT  -->

            <!-- modal large -->
            <div class="modal fade" id="largemodal" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largemodalLabel">Tambah Permission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        {!! Form::open(['route' => 'permissions.store', 'method'=>'POST', 'id'=>'store']) !!}
                            @include('admin.permission.form')
                        {!! Form::close() !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="event.preventDefault();getElementById('store').submit()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal large -->
@endsection