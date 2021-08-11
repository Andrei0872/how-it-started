$('input[class="checkInput"]').click(function() {
    // alert(1);
    var $this = $(this);
    if ($this.is(":checked")) {
        $(".checkInput").not($this).prop({ disabled: true, checked: false });
        // $(".checkInput").prop("checked", true);
    } else {
        $(".checkInput").prop("disabled", false);
    }
});
$( ".dati" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });