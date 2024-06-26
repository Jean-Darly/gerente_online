// public/js/autocomplete.js

$(document).ready(function () {
  $("#nome").autocomplete({
    source: function (request, response) {
      $.ajax({
        url: "/etiqueta/autocomplete",
        dataType: "json",
        data: {
          term: request.term
        },
        success: function (data) {
          response(data);
        }
      });
    },
    minLength: 2,
    select: function (event, ui) {
      $("#nome").val(ui.item.value);
      $("#id_etiqueta").val(ui.item.id);
      return false;
    }
  }).data("ui-autocomplete")._renderItem = function (ul, item) {
    return $("<li>")
      .append("<div>" + item.value + "</div>")
      .appendTo(ul);
  };

  // Evento para limpar o campo hidden quando o input é alterado
  $("#nome").on('input', function () {
    $("#id_etiqueta").val('');
  });

  // Evento para validar o formulário
  $("#nomeForm").on('submit', function (event) {
    if ($("#id_etiqueta").val() === '') {
      alert("Por favor, selecione um nome da lista.");
      event.preventDefault(); // Impede o envio do formulário
    }
  });
  // Focar no campo #nome
  $("#nome").focus();
});