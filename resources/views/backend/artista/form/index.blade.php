<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">

                <div class="form-group  col-sm-6">
                    <label for="name" class="control-label">Nombres  </label>
                        <input type="text"  name="nombre" class="form-control  @if($errors->first('nombre')) is-invalid @endif" value="{{ @$artista->nombre}}" id="nombre" placeholder="Nombres" required>
                        <span class="error invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                </div>


                

            </div>
        </div>
    </div>

</div>












