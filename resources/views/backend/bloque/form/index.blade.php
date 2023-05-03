<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="titulo" class="control-label">Titulo  </label>
                            <input type="text"  name="titulo" class="form-control  @if($errors->first('titulo')) is-invalid @endif" value="{{ @$item->titulo}}" id="name" placeholder="Titulo" >
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="enlace" class="control-label">Enlace  </label>
                            <input type="text"  name="enlace" class="form-control  @if($errors->first('enlace')) is-invalid @endif" value="{{ @$item->enlace}}" id="name" placeholder="Descripción" required>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('enlace') }}</strong>
                            </span>
                    </div>
                </div>

                <div class="col-md-12">

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{@$item->descripcion}}">
                    </div>

                    <div class="form-group">
                        <label for="tipoenlace">Tipo de enlace</label>
                        <select class="custom-select rounded-0"  name="tipo_enlace" id="tipoenlace">
                            <option>Seleccione</option>
                            <option value="0" {{$item->tipo_enlace==0?'selected':''}}>Interno</option>
                            <option value="1" {{$item->tipo_enlace==1?'selected':''}}>Externo</option>
                          
                        </select>
                    </div>
                </div>
               
               

            </div>
        </div>
    </div>

</div>












