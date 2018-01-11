
$('.datepicker').pickadate({
   selectMonths: true,
   selectYears: 100, 
   format: 'yyyy-mm-dd',
   min: new Date((new Date()).getFullYear() - 100 , (new Date()).getMonth() , (new Date()).getDate() ),
   max: new Date(),
   closeOnSelect: true // Close upon selecting a date,
 });

$( document ).ready(function(){
  $("select").material_select();



});
