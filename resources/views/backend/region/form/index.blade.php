<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="nombre" class="control-label">Nombres  </label>
                            <input type="text"  name="nombre" class="form-control  @if($errors->first('nombre')) is-invalid @endif" value="{{ @$region->nombre}}" id="name" placeholder="Nombres" required>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>












