$(function () {

  try {
    bsCustomFileInput.init();
  } catch (error) {
    console.log("no inicializado");
  }

  
  });

$(document).on('change','.custom-file-input',function(e){
    let nombre = e.target.files[0].name;
    padre = $(this).parent();
    padre.children("label").html(nombre);
});


$(".btn__agregar_imagen").on('click',function(e){
    e.preventDefault();

    let numeros = $(".custom-file-input").length;
    indice = numeros+1;
   
    $(".placeimages").append(`<div class="form-group">
    <div class="custom-file">
      <input type="file" name="imagen[]" id="customfile${indice}" placeholder="Imagen" class="custom-file-input" aria-describedby="fileHelpId">
     <label for="customfile${indice}" class="custom-file-label">Elija una imagen</label>
    </div>
   
  </div>`);

});

$(".btn-object-delete").on("click", function(){
  let id = $(this).data('id');
  $(".delete-objeto input[name='id']").val(id);
});
$(document).ready(function() {
$('#contenidometodo').ckeditor();
});

try {
  var newCKEdit = CKEDITOR.replace('contenido', {
      height: '600px',
  });
  



 // CKEDITOR.plugins.addExternal('slider', '/js/ckfinder/plugins/slider/');
 // CKEDITOR.config.extraPlugins = 'slider';

 /* CKEDITOR.on( 'instanceCreated', function( e ){
      e.editor.addCss("@font-face{'Alfa Slab One', cursive; src:url('http://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');"  );
        });*/

        CKEDITOR.editorConfig = function( config ) {

          //config.contentsCss = 'https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap';

          //config.font_names = config.font_names + 'Alfa Slab One/Alfa Slab One;';
          //config.font_names = config.font_names + 'Open Sans/Open Sans;';


          }

  //CKEDITOR.config.contentsCss = '/assets/public/css/site.css?v=2';
  //CKEDITOR.config.templates_files = [ '/ckeditor/plugins/templates/templates/default.js' ];


} catch (e) {
  console.log("no iniciado");
}