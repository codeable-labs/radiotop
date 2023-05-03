<div class="row">
    <div class="card col-sm-12">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group  ">
                    <label for="artista" class="control-label">Artista  </label>
                      <select name="artista" id="artista" class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($artistas as $row)
                            <option value="{{$row->id}}" {{$row->id==@$ranking->artist_id?"selected":''}}>{{$row->nombre}}</option>
                        @endforeach
                      </select>
                </div>


                <div class="form-group @if($errors->first('region')) has-error @endif ">
                    <label for="region" class="control-label"> Región </label>
                        <select name="region" id="region" class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($regiones as $row)
                                <option value="{{$row->id}}" {{$row->id==@$ranking->region_id?"selected":''}}>{{$row->nombre}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group @if($errors->first('genero')) has-error @endif">
                    <label for="genero" class="control-label"> Género </label>
                        <select name="genero" id="genero" class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($generos as $row)
                                <option value="{{$row->id}}" {{$row->id==@$ranking->gender_id?"selected":''}}>{{$row->nombre}}</option>
                            @endforeach
                        </select>
                </div>


                <div class="form-group @if($errors->first('mes')) has-error @endif">
                    <label for="mes" class="control-label"> Mes </label>
                        <select name="mes" id="mes" class="form-control">
                            <option value="">Seleccione</option>
                           
                                <option value="Enero" {{@$ranking->mes=="Enero"?"selected":''}}>Enero</option>
                                <option value="Febrero" {{@$ranking->mes=="Febrero"?"selected":''}}>Febrero</option>
                                <option value="Marzo" {{@$ranking->mes=="Marzo"?"selected":''}}>Marzo</option>
                                <option value="Abril" {{@$ranking->mes=="Abril"?"selected":''}}>Abril</option>
                                <option value="Mayo" {{@$ranking->mes=="Mayo"?"selected":''}}>Mayo</option>
                                <option value="Junio" {{@$ranking->mes=="Junio"?"selected":''}}>Junio</option>
                                <option value="Julio" {{@$ranking->mes=="Julio"?"selected":''}}>Julio</option>
                                <option value="Agosto" {{@$ranking->mes=="Agosto"?"selected":''}}>Agosto</option>
                                <option value="Setiembre" {{@$ranking->mes=="Setiembre"?"selected":''}}>Setiembre</option>
                                <option value="Octubre" {{@$ranking->mes=="Octubre"?"selected":''}}>Octubre</option>
                                <option value="Noviembre" {{@$ranking->mes=="Noviembre"?"selected":''}}>Noviembre</option>
                                <option value="Diciembre" {{@$ranking->mes=="Diciembre"?"selected":''}}>Diciembre</option>
                           
                        </select>
                </div>


                <div class="form-group @if($errors->first('year')) has-error @endif">
                    <label for="year" class="control-label"> Año </label>
                        <select name="year" id="year" class="form-control">
                            <option value="">Seleccione</option>
                            @for($i=2022;$i<2035;$i++)

                                <option value="{{$i}}" {{$i==@$ranking->year?"selected":''}}>{{$i}}</option>
                           
                            @endfor
                        </select>
                </div>


            </div>

            <div class="col-md-6">

                <div class="card">
                   
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="archivo" id="customfile1" placeholder="Archivo" class="custom-file-input" aria-describedby="fileHelpId">
                                <label for="customfile1" class="custom-file-label">Elija un archivo PDF</label>
                                </div>
                                
                                </div>
                            </div>

                            <div class="col-md-12 placeimages">
                                @if(isset($ranking->archivo))
                
                                <div class="col-md-12 text-center">
                                    <iframe class="ranking_resultados__document" src="/storage/{{$ranking->archivo}}" title="Radio TOP TV" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            </div>
        </div>
    </div>

</div>












