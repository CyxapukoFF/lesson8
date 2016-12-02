$(function() {

    var funcArr = {
      "showUsersList" : function() {
        var text = "";

        $.get('/index.php?c=api&a=index', {},
          function(data){
            text = "<ul>";
            data.forEach(function(item, i, arr) {
              text += "<li>" + item.name + "   (" + item.price + ")</li>";
            });
            text += "</ul>";
            $("#contentContainer").html(text);
          },
          "json"
        );


      },


      "addNewItem" : function() {
        var text = "<form id=\"productForm\">";
        text += "Name:<br/><input type\"text\" id=\"productName\" value=\"\" /><br/>";
        text += "Price:<br/><input type\"text\" id=\"productPrice\" value=\"\" /><br/>";
        text += "<button>Send</button>";
        text += "</form>";
        $("#contentContainer").html(text);

        $("#productForm button").click(function() {
          var data = {
            "name"  : $("#productName").val(),
            "price" : $("#productPrice").val(),
            "new_prod" : 1
          };
          $("#contentContainer").html("Sending data...");
          $.post('/index.php?c=api&a=add',
            data,
            function(d){
              if (d.status == "ok") {
                $("#contentContainer").html("OK");
              }
              else {
                $("#contentContainer").html("error");
              }
            },
            "json"
          );
          return false;
        });

      },


      "clearContainer" : function() {
        $("#contentContainer").html("");

      },

    };


    $(".menuItem").click(function(){
      var item = $(this);
      var name = item.attr("rel");
      funcArr[name]();
      return false;
    });
});
