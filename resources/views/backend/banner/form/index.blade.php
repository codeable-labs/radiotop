<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">


                <div class="col-md-12">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="imagen" id="customfile1" placeholder="Imagen" class="custom-file-input" aria-describedby="fileHelpId">
                            <label for="customfile1" class="custom-file-label">Elija una imagen</label>
                        </div>
                    
                    </div>
                </div>

                @if(isset($banner->imagen))
                
                <div class="col-md-12 text-center">
                    <img src="/storage/{{@$banner->imagen}}" width="70" class="img-thumbnail rounded mx-auto d-block">
                </div>
            @endif

           


                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="titulo" class="control-label">Titulo  </label>
                            <input type="text"  name="titulo" class="form-control  @if($errors->first('titulo')) is-invalid @endif" value="{{ @$banner->titulo}}" id="name" placeholder="Titulo" required>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="autor" class="control-label">Autor  </label>
                            <input type="text"  name="autor" class="form-control  @if($errors->first('autor')) is-invalid @endif" value="{{ @$banner->autor}}" id="name" placeholder="Autor" required>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('autor') }}</strong>
                            </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group  ">
                        <label for="cancion" class="control-label">Canción  </label>
                            <input type="text"  name="cancion" class="form-control  @if($errors->first('cancion')) is-invalid @endif" value="{{ @$banner->autor}}" id="name" placeholder="Canción" required>
                            <span class="error invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cancion') }}</strong>
                            </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ranking">Ranking</label>
                        <select name="ranking" id="ranking" class="custom-select rounded-0">
                            <option value="">Seleccione</option>
                            @foreach ($rankings as $rank)
                            <option value="{{$rank->id}}"  {{$rank->id==@$banner->register_id?"selected":""}}>{{@$rank->artist->nombre}} {{@$rank->region->nombre}} {{@$rank->gender->nombre}}</option>
                            @endforeach
                            
                        </select>
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












