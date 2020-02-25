<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  $(function(){ 
  $('.price').each(function(){
    $(this).html(numberWithCommas($(this).html()));
  });
  });
</script>