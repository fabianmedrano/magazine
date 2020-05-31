$(document).ready(function () {

  $("#form-nosotros-edit").submit(function (ev) {
      ev.preventDefault();
      swal({
              title: "Está seguro?",
              text: "Se modificara la informacion. Esta acción es irreversible!",
              type: "warning",
              showCancelButton: true,
              confirmButtonText: "Actualizar!",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false,
              showLoaderOnConfirm: true,
              closeOnCancel: false
          })
          .then((value) => {
              if (value) {
                  var $form = $("#form-nosotros-edit");
                  var $accion = "&btn_accion=Actualizar";
                  $.ajax({
                      method: $form.attr("method"),
                      url: $form.attr("action"),
                      data: $form.serialize() + $accion ,
                      async: false,
                      dataType: "json",

                      success: function () {
                          swal("Infomacion actualizada de forma exitosa", {
                              icon: "success",
                          });
                      },
                      error: function () {
                          swal("Ha ocurrido un error", "intente refrescar la pagina", "error");
                      }
                  });
              } else {
                  swal("Cancelado", "Se ha cancelado la acción de actualizar", "error");
              }
          });


  });










});