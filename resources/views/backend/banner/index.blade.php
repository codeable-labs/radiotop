@extends('layout.backend.app')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Banners</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item active">Banners</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if (session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="/admin/banners/create"
                                        class="btn btn-block btn-outline-primary btn-flat  mt-2">Crear banner</a>
                                </div>
                            </div>
                           
                           

                        <div class="row">
                            <div class="col-md-12 mt-5 mb-5">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Titulo</th>
                                        <th>Autor</th>
                                        <th>Canción</th>

                                        <th>Banner</th>
                                        <th>Ranking</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                      @foreach ($banners as $k=> $banner)
                                          
                                     
                                            <tr>
                                                
                                                <th>{{$k+1}}</th>
                                                <td>{{$banner->titulo}}</td>
                                                <td>{{$banner->autor}}</td>
                                                <td>{{$banner->cancion}}</td>

                                                <td><img src="/storage/{{$banner->imagen}}" width="50"></td>
                                                <td>{{@$banner->register->artist->nombre}} - {{@$banner->register->region->nombre}} - {{@$banner->register->gender->nombre}}</td>
                                               
                                                <td>{{$banner->created_at}}</td>
                                                <td width="7%">
                                                    <a href="/admin/banners/{{ @$banner->id }}/edit"
                                                        class="btn-xs btn btn-outline-info "><i class="far fa-edit"></i></a>
                                                    <a href="#" data-id="{{ @$banner->id }}" data-toggle="modal"
                                                        data-target="#delobjeto"
                                                        class="btn btn-xs btn-dangers btn-object-delete"><i
                                                            class="far fa-trash-alt"></i></a>

                                                </td>
                                            </tr>
                                        

                                @endforeach
                                          
                                </tbody>

                            </table>
                            </div>
                        </div>

                           

                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>


    <div class="modal fade" id="delobjeto">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">

                <form class="delete-objeto" action="/admin/banners/delete" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h4 class="modal-title">Confirmar Eliminación</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">

                        <input type="hidden" name="_method" value="delete">

                        <input type="hidden" name="id" id="id">
                        <p>¿Esta seguro de eliminar este item?</p>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-light">Eliminar</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

    </div>



@endsection
