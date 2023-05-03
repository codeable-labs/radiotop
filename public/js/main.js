var artistas = document.querySelectorAll(".input__artista");
var regiones  = document.querySelectorAll(".input__region");
var generos = document.querySelectorAll(".input__genero");

artistas.forEach(function(elemento){
    elemento.addEventListener('click',datosArtist);
});

regiones.forEach(function(elemento){
    elemento.addEventListener('click',datosRegion);
});

generos.forEach(function(elemento){
    elemento.addEventListener('click',datosGenero);
});

function datosArtist(){

    let reg_id = getValueRegion();
    let gen_id = getValueGenero();
    let art_id = getValueArtista();

  
    obtenerDatos(reg_id,gen_id,art_id);
    let genero = document.querySelector(".fnGeneroMusicalOptions");
    if(art_id==1){ 
        genero.classList.add('-disable-');
    }else{
        genero.classList.remove('-disable-');
    }
}

function datosRegion(){
    let reg_id = getValueRegion();
    let gen_id = getValueGenero();
    let art_id = getValueArtista();

    
    obtenerDatos(reg_id,gen_id,art_id);
    let genero = document.querySelector(".fnGeneroMusicalOptions");
    if(art_id==1){ 
        genero.classList.add('-disable-');
    }else{
        genero.classList.remove('-disable-');
    }
}

function datosGenero(){
    let reg_id = getValueRegion();
    let gen_id = getValueGenero();
    let art_id = getValueArtista();

    obtenerDatos(reg_id,gen_id,art_id);
    let genero = document.querySelector(".fnGeneroMusicalOptions");
    if(art_id==1){ 
        genero.classList.add('-disable-');
    }else{
        genero.classList.remove('-disable-');
    }
}


function obtenerDatos(region,genero,artista){
   
    const token = $('meta[name="csrf-token"]').attr('content');
    const url = '/get-result';
    let data = {artist_id:artista,region_id:region,gender_id:genero,_token:token,_method:'POST'};
    fetch(url,{
        method:'POST',
        body: JSON.stringify(data),
        headers:{
            'Content-Type':'application/json'
        }
    })
    .then(res => res.json())
    .then(response=>{
        if(response!=""){
            $('.fnRankingResults').removeClass('m--empty');
            
            if(response.genero=="empty"){
                $('.fnRankingGenderImage').attr('src', '/storage/'+response.icono_region);
            }else{
                
                let genero = response.genero;
                $('.fnRankingGenderImage').attr('src', '/storage/'+response.icono_genero);
            }

            $('.fnRankingName').html(response.title);
            $('.fnRankingButtonDownload').attr('href', '/storage/'+response.archivo);
            $('.fnRankingButtonDetail').attr('href', '/ranking/'+response.genero+'/'+response.region+'/'+response.artista);
            $(".fnRankingDate").html(response.fecha);
        }
    });
}


function getValueRegion(){
    var valor;
    regiones.forEach(function(element){
        if(element.checked == true){
            valor=  element.value;

          
        }
    });

    return valor;
}

function getValueGenero(){
    var valor;
    generos.forEach(function(element){
        if(element.checked == true){
            valor=  element.value;
        }
    });
    return valor;
}

function getValueArtista(){
    var valor;
    artistas.forEach(function(element){
        if(element.checked == true){
            valor=  element.value;
        }
    });
    return valor;
}

