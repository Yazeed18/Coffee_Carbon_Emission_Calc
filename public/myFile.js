$("#select_box1").change(function() {
  if ($(this).val() == "Custom") {
    $('#inputMilk').show();
    $('#inputA').attr('required', '');
    $('#inputA').attr('data-error', 'This field is required.');
  } else {
    $('#inputMilk').hide();
    $('#inputA').removeAttr('required');
    $('#inputA').removeAttr('data-error');
  }
});
$("#select_box1").trigger("change");

// $("#seeAnotherFieldGroup").change(function() {
//   if ($(this).val() == "yes") {
//     $('#otherFieldGroupDiv').show();
//     $('#otherField1').attr('required', '');
//     $('#otherField1').attr('data-error', 'This field is required.');
//     $('#otherField2').attr('required', '');
//     $('#otherField2').attr('data-error', 'This field is required.');
//   } else {
//     $('#otherFieldGroupDiv').hide();
//     $('#otherField1').removeAttr('required');
//     $('#otherField1').removeAttr('data-error');
//     $('#otherField2').removeAttr('required');
//     $('#otherField2').removeAttr('data-error');
//   }
// });
// $("#seeAnotherFieldGroup").trigger("change");
