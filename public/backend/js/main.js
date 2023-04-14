$(function () {
    bsCustomFileInput.init();
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
