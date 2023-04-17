<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="nombre" class="control-label">Nombres  </label>
                            <input type="text"  name="nombre" class="form-control  @if($errors->first('nombre')) is-invalid @endif" value="{{ @$genero->nombre}}" id="name" placeholder="Nombres" required>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre" class="control-label">Icono  </label>
                        <div class="custom-file">
                            <input type="file" name="icono" id="customfile1" placeholder="Imagen" class="custom-file-input" aria-describedby="fileHelpId">
                            <label for="customfile1" class="custom-file-label">Elija un icono</label>
                        </div>
                    
                    </div>
                </div>

                @if(isset($genero->icono))
                    <div class="col-md-12 text-center">
                        <img src="/storage/{{@$genero->icono}}" width="70" class="img-thumbnail rounded mx-auto d-block">
                    </div>
                @endif


            </div>
        </div>
    </div>

</div>












