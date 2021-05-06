jQuery(document).ready(function ($) {
  var url = window.location.pathname;
  var pathname = window.location.pathname.indexOf("index.php");
  var path = "";
  if (pathname >= 0) {
    path = url.substr("0", pathname);
  } else {
    path = "";
  }

  $("#msg-box .fechar").on("click", function () {
    $("#msg-box").slideUp();
  });

  $("#termo").change(function () {
    if (this.checked) {
      $("#enviar").removeAttr("disabled");
    } else {
      $("#enviar").attr('disabled', true); 
    }
  });

  $("#form-actions-form").on("submit", function (event) {
    event.preventDefault();

    var formData = new FormData($(this)[0]);

    $("#msg-box").slideUp();
    $("#msg").html("");
    var msg = [];
    var focus = "";

    if (formData.get("nome").length < 2) {
      msg.push("Informe o Nome!");
      focus = "nome";
    }
    if (formData.get("cota").length < 4) {
      msg.push("Informe a Cota!");
      focus = "cota";
    }
    if (
      formData.get("frase").length < 2 ||
      formData.get("frase").length > 145
    ) {
      msg.push("Informe uma frase com até 145 caracteres!");
      focus = "frase";
    }
    if (
      formData.get("palavra").length < 2 ||
      formData.get("palavra").length > 45
    ) {
      msg.push("Informe uma palavra com até 45 caracteres!");
      focus = "palavra";
    }
    if (
      formData.get("anexo").name &&
      formData.get("anexo").size &&
      formData.get("anexo").type != "image/gif" &&
      formData.get("anexo").type != "image/x-icon" &&
      formData.get("anexo").type != "image/jpeg" &&
      formData.get("anexo").type != "image/png" &&
      formData.get("anexo").type != "image/svg+xml" &&
      formData.get("anexo").type != "image/webp"
    ) {
      msg.push("Tipo de arquivo inválido!");
      focus = "anexo";
    }

    if (msg.length) {
      msg.reverse();
      msg.forEach(mensagens);
      function mensagens(item, index) {
        $("#msg").append("<p>" + item + "</p>");
      }
      $("html, body").animate(
        {
          scrollTop:
            $("#actions-form").offset().top - $("#header").height() - 10,
        },
        300,
        function () {
          $("#msg-box").slideDown("slow");
        }
      );
      $("#msg-box").removeClass("alert-success").addClass("alert-danger");
      $("#" + focus).focus();

      return false;
    }

    $.ajax({
      type: "POST",
      url: path + "modules/mod_actions_form/tmpl/sendmail.php",
      async: true,
      data: formData,
      dataType: "JSON",
      processData: false,
      contentType: false,
      success: function (data) {
        $("#msg-box")
          .removeClass("alert-danger")
          .addClass("alert-" + data.class);
        $("#msg").append(data.msg);
        $("html, body").animate(
          {
            scrollTop:
              $("#actions-form").offset().top - $("#header").height() - 10,
          },
          300,
          function () {
            $("#msg-box").slideDown("slow");
          }
        );
      },
      beforeSend: function () {
        $(".loading").fadeIn("fast");
      },
      complete: function () {
        $("#form-actions-form")[0].reset();
        $("#enviar").attr('disabled', true); 
        $(".loading").fadeOut("fast");
      },
    });
  });
});
