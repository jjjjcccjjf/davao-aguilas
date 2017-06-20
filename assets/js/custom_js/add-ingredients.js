$(document).ready(function() {

  var i = $('input').size() + 1;

  $('#add_other').click(function() {
    $('<div class="inputs_other" id="other_'+i+'"><div class="col-sm-8 form-group"><input type="text" class="form-control" name="other_ingredients[]" value="" placeholder="i.e. Sugar" /></div><div class="col-sm-3 form-group"><input type="text" class="form-control" name="other_amount[]" value="" placeholder="100g."></div><div class="col-sm-1 form-group delete-ingre"><a href="javascript:void(0);" onclick="deleteIngredients(\'other_'+i+'\')" class="close-other-o"><i class="fa fa-times"></i></a></div></div>').fadeIn('slow').appendTo('.inputs_other_outer');
    i++;
  });

  $('#remove_other').click(function() {
    if (i > 1) {
      $('.inputs_other:last').remove();
      i--;
    }
  });

  /* Puratos Product */
  // $('#add_product').click(function(){
  //   alert("Test");
  //   $.ajax({
  //     url: "admin/test",
  //     type: "POST",
  //     succcess: function(msg) {
  //       console.log(msg);
  //     }
  //   });
  // });

 /* Not Used */
  $('#reset').click(function() {
    while (i > 2) {
      $('.field_other:last').remove();
      i--;
    }
  });

  // here's our click function for when the forms submitted

  $('.submit').click(function() {

    var answers = [];
    $.each($('.field'), function() {
      answers.push($(this).val());
    });

    if (answers.length == 0) {
      answers = "none";
    }

    alert(answers);

    return false;

  });

});
