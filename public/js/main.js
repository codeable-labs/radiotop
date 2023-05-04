var artistas = document.querySelectorAll(".input__artista");
var regiones  = document.querySelectorAll(".input__region");
var generos = document.querySelectorAll(".input__genero");
console.log( artistas )

const RANKING_VALUES = {}

const rankingValuesObserver = _ => { 
    const values = { 
        'reg_id':getValueRegion(), 
        'gen_id':getValueGenero(), 
        'art_id': getValueArtista() 
    }
    Object.assign(RANKING_VALUES, {...values})
}

artistas.forEach(function(elemento){
    elemento.addEventListener('change',setData);
});

regiones.forEach(function(elemento){
    elemento.addEventListener('change',setData);
});

generos.forEach(function(elemento){
    elemento.addEventListener('change',setData);
});

function setData(){
    rankingValuesObserver()
    obtenerDatos();

    let genero = document.querySelector(".fnGeneroMusicalOptions");
    if(RANKING_VALUES.art_id==1){ 
        genero.classList.add('-disable-');
    }else{
        genero.classList.remove('-disable-');
    }
}

document.addEventListener("DOMContentLoaded", function(){
    setTimeout(function() {
        rankingValuesObserver();
        const isEmpty = Object.values(RANKING_VALUES).every( value => value );
        isEmpty && obtenerDatos()
    }, 500)
});

function obtenerDatos() {
   
    const { reg_id, gen_id, art_id } = RANKING_VALUES
    const token = $('meta[name="csrf-token"]').attr('content');
    const url = '/get-result';
    let data = {artist_id:art_id,region_id:reg_id,gender_id:gen_id,_token:token,_method:'POST'};
    fetch(url,{
        method:'POST',
        body: JSON.stringify(data),
        headers:{
            'Content-Type':'application/json'
        }
    })
    .then(res => res.json())
    .then(response=>{
        
        if( response!="" && Object.keys(response).length>0 ){

            console.log(response)
            $('.fnRankingResults').removeClass('m--empty');
            
            if(response.genero=="empty"){
                $('.fnRankingGenderImage').attr('src', '/storage/'+response.icono_region);
            }else{
                let genero = response.genero;
                $('.fnRankingGenderImage').attr('src', '/storage/'+response.icono_genero);
            }
            
            $('.fnRankingName').html( response.title );
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

