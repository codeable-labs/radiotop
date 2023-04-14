<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">

                <div class="form-group  col-sm-6">
                    <label for="name" class="control-label">Lugar</label>
                       <select name="lugar" id="lugar" class="custom-select rounded-0">
                            <option value="">Seleccione</option>
                            @foreach ($lugares as $item)
                                <option value="{{$item->id}}" {{$item->id==@$publicidad->place_id?"selected":""}}>{{$item->nombre}}</option>
                            @endforeach
                       </select>
                </div>

                <div class="form-group  col-sm-6">
                    <label for="url" class="control-label">URL  publicidad</label>
                        <input type="text"  name="url" class="form-control  @if($errors->first('url')) is-invalid @endif" value="{{ @$publicidad->url}}" id="name" placeholder="URL" required>
                        <span class="error invalid-feedback" role="alert">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                </div>


                
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="imagen" id="customfile1" placeholder="Imagen" class="custom-file-input" aria-describedby="fileHelpId">
                            <label for="customfile1" class="custom-file-label">Elija una imagen</label>
                        </div>
                    
                    </div>
                </div>
               
                @if(isset($publicidad->imagen))
                
                    <div class="col-md-12 text-center">
                        <img src="/storage/{{$publicidad->imagen}}" width="70" class="img-thumbnail rounded mx-auto d-block">
                    </div>
            
                @endif


            </div>
        </div>
    </div>

</div>












