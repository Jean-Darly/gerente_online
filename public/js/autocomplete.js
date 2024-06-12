$(document).ready(function() {
    $("#etiqueta").autocomplete({
      source: function(request, response) {
        console.log("Termo de pesquisa: ", request.term); // Adiciona um log aqui
        $.ajax({
          url: "/etiqueta/autocomplete",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function(data) {
            console.log("Dados recebidos: ", data); // E aqui
            response(data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("Erro na requisição: ", textStatus, errorThrown);
          }
        });
      },
      minLength: 2,
      select: function(event, ui) {
        $("#etiqueta").val(ui.item.value);
        $("#etiqueta_id").val(ui.item.id);
        return false;
      }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
      return $("<li>")
        .append("<div>" + item.value + "</div>")
        .appendTo(ul);
    };
  
    // Evento para limpar o campo hidden quando o input é alterado
    $("#etiqueta").on('input', function() {
      $("#etiqueta_id").val('');
    });
  
    // Evento para validar o formulário
    $("#etiquetaForm").on('submit', function(event) {
      if ($("#etiqueta_id").val() === '') {
        alert("Por favor, selecione uma etiqueta da lista.");
        event.preventDefault(); // Impede o envio do formulário
      }
    });
  });
  