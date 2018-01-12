
$('.datepicker').pickadate({
   selectMonths: true,
   selectYears: 100,
   format: 'yyyy-mm-dd',
   min: new Date((new Date()).getFullYear() - 100 , (new Date()).getMonth() , (new Date()).getDate() ),
   max: new Date(),
   closeOnSelect: true // Close upon selecting a date,
 });

$( document ).ready(function(){
  $(".dropdown-button").dropdown();

  $("select").material_select();
  // for HTML5 "required" attribute
  $("select[required]").css({display: "inline", height: 0, padding: 0, width: 0});
});

$('#alert_close').click(function(){
    $( "#alert_box" ).fadeOut( "slow", function() {
    });
  });
