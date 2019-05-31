$(document).ready(function(){
    var $form = $('form');
    $form.submit(function(){
       $.post($(this).attr('action'), $(this).serialize(), function(response){
             // do something here on success
       },'json');
       return false;
    });
 });