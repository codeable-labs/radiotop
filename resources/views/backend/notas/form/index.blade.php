<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="titulo" class="control-label">Titulo  </label>
                            <input type="text"  name="titulo" class="form-control  @if($errors->first('titulo')) is-invalid @endif" value="{{ @$nota->titulo}}" id="name" placeholder="Titulo" required>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="descripcion" class="control-label">Descripción  </label>
                            <input type="text"  name="descripcion" class="form-control  @if($errors->first('descripcion')) is-invalid @endif" value="{{ @$nota->descripcion}}" id="name" placeholder="Descripción" required>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="imagen" id="customfile1" placeholder="Imagen" class="custom-file-input" aria-describedby="fileHelpId">
                            <label for="customfile1" class="custom-file-label">Elija una imagen</label>
                        </div>
                    
                    </div>
                </div>

                @if(isset($nota->imagen))
                
                    <div class="col-md-12 text-center">
                        <img src="/storage/{{$nota->imagen}}" width="70" class="img-thumbnail rounded mx-auto d-block">
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="archivo" id="customfile1" placeholder="Archivo" class="custom-file-input" aria-describedby="fileHelpId">
                            <label for="customfile1" class="custom-file-label">Elija un archivo</label>
                        </div>
                    
                    </div>
                </div>
               
                @if(isset($nota->archivo))
                
                    <div class="col-md-12 text-center">
                        <iframe class="ranking_resultados__document" src="/storage/{{$nota->archivo}}" title="Radio TOP TV" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endif

            </div>
        </div>
    </div>

</div>












