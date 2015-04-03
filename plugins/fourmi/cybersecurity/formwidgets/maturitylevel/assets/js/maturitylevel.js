/*
 * This is a sample JavaScript file used by {{ name }}
 *
 * You can delete this file if you want
 */
 $(function(){

   $('input[name^="Country[maturity_levels]"]')
     .on('change', function(ev){
       $(this).closest('.row').find('.progress-bar').width(($(this).val()*20)+'%' );
     })
     .on('keypress', function(ev){
       // Ensure that it is a number between 0 and 5 and stop the keypress
       if (ev.charCode >= 48 && ev.keyCode <= 53) {
         this.value = '';
       }else{
         ev.preventDefault();
       }
     })
     .trigger('change');


   $('input[name^="Country[maturity_levels]"]').first()
     .tooltip({
      title: 'Tip: navigate with TAB and change values with ARROW KEYS',
      container: 'body',
      trigger: 'manual'
    })
    .tooltip('show')
    .one('blur',function(ev){
      $(this).tooltip('hide');
    })
    .focus();




 });
