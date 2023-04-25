<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo" class="control-label">Titulo  </label>
                            <input type="text"  name="titulo" class="form-control  @if($errors->first('titulo')) is-invalid @endif" value="{{ @$metodo->titulo }}" id="name" placeholder="Titulo">
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="orden">Orden</label>
                        <input type="text" name="orden" id="orden" class="form-control" value="{{@$metodo->orden}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="contenido" class="control-label">Contenido  </label>
                            <textarea  name="contenido" class="form-control" rows="3" id="contenido" required>{!! @$metodo->contenido !!}</textarea>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contenido') }}</strong>
                            </span>
                    </div>
                </div>

               

               
              

            </div>
        </div>
    </div>

</div>











