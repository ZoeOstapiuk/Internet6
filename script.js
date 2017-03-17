var field = [
  [0, 0, 0],
  [0, 0, 0],
  [0, 0, 0]
];

function postMove() {
    $.ajax({
          type: "POST",
          url: 'http://localhost:8080/lab5/tic-tac-toe.php',
          data: { field: field },
          success: function(data) {
              if (data == -1) {
                  alert("You won!");
              } else if (data == -2) {
                  alert("I won!");
              } else if (data == -3) {
                  alert("Even!");
              } 
              else {
                  var row = Math.trunc(data / 3);
                  var col = data - row * 3;
                  field[row][col] = -1;
                  $("[data-point=" + data + "]").attr("src", zeroPath);
              }
          }
    });
}

var crossPath = "Images/cross-24-512.png";
var zeroPath = "Images/Circle_Blue.png";
var background = "Images/3372591421_f63cc43c30_o.jpg";

$(document).ready(function() {
    $("img").attr('src', background);
    $("img").hover(function() {
        $(this).css("cursor", "pointer");
    });
    $("img").click(function() {
        var point = $(this).data("point");
        var row = Math.trunc(point / 3);
        var col = point - row * 3;
        if (field[row][col] == 0) {
            $(this).attr("src", crossPath);
            field[row][col] = 1;
            postMove();
        }
    });
    $("#submit").click(function() {
        postText();
    });
});

function postText() {
    $.ajax({
          type: "POST",
          url: 'http://localhost:8080/lab5/text.php',
          data: { text: $("#text").val() },
          success: function(data) {
              $("#result").html(data);
          }
    });
}