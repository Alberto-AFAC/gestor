// Buscador de tabla
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$("#selectall").on("click", function() {
  $(".idinsp").prop("checked", this.checked);
});

// if all checkbox are selected, check the selectall checkbox and viceversa
$(".idinsp").on("click", function() {
  if ($(".idinsp").length == $(".idinsp:checked").length) {
    $("#selectall").prop("checked", true);
  } else {
    $("#selectall").prop("checked", false);
  }
});

// REMOVE ROWS IN REGISTER
var arr = $("#test tr");

$.each(arr, function(i, item) {
    var currIndex = $("#test tr").eq(i);
    var matchText = currIndex.find('td:nth-child(3)').text();
    $(this).nextAll().each(function(i, inItem) {
        if(matchText===$(this).find('td:nth-child(3)').text()) {
            $(this).remove();
        }
    });
});
