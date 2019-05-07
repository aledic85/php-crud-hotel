function printName() {

  $.ajax({

    url: 'getPendingGuests.php',
    method: "GET",
    success: function(data) {

      var pending = JSON.parse(data);
      var template = $("#template").html();
      var compiled = Handlebars.compile(template);

      for (var i = 0; i < pending.length; i++) {

        var item = pending[i];
        var itemHtml = compiled(item);

        $(".pending").append(itemHtml);
      }
    }
  });
}

function init() {

  printName();
}

$(document).ready(init);
