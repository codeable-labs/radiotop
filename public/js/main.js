var artistas = document.querySelectorAll(".input__artista");
var regiones  = document.querySelectorAll(".input__region");
var generos = document.querySelectorAll(".input__genero");

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

            $('.fnRankingResults').removeClass('m--empty');
            
            if(response.genero=="empty"){
                $('.fnRankingGenderImage').attr('src', '/storage/'+response.icono_region);
            }else{
                let genero = response.genero;
                $('.fnRankingGenderImage').attr('src', '/storage/'+response.icono_genero);
            }
            
            $('.fnRankingName').html( response.title );
            $('.fnRankingButtonDownload').attr('href', '/storage/'+response.archivo);
            $('.fnRankingButtonDetail').attr('href', '/rankings/'+response.genero+'/'+response.region+'/'+response.artista);
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

const $_ubigeo_selects = document.querySelectorAll('.fnSelect')
$_ubigeo_selects.forEach(select => {
    select.addEventListener( 'change', function() {
        const params = {
            target: this.dataset.target,
            ubigeo: this.options[this.selectedIndex].dataset.ubigeo,
            clean: this.dataset.clean
        }
        setUbigeo(params)
    })
});

setUbigeo({target:'departamentos'})

function setUbigeo( {target, ubigeo, clean} ) {
    if ( !target ) return
    fetch('/js/'+target+'.json')
        .then((response) => response.json())
        .then((json) => {
            const empty_option = '<option value="">Seleccionar</option>'
            const array_options = ubigeo ? json[ubigeo] : json
            const options = array_options.map( ({nombre_ubigeo, id_ubigeo}) => `<option value="${nombre_ubigeo}" data-ubigeo="${id_ubigeo}">${nombre_ubigeo}</option>` ).join('')
            const $target = document.getElementById(target)
            $target.innerHTML = empty_option+options
            clean && ( document.getElementById(clean).innerHTML = empty_option)
        })
}
