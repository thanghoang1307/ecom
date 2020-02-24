<script src="/assets/js/main.js"></script>
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
<script>
$(function(){
var count = 8;
$('.view-more-btn').on('click',function(){
console.log('before-ajax');
$.ajax({
type: 'POST',
url:"{{route('front.view-more')}}",
data: {'_token':'{{csrf_token()}}', 'count': count},
success: function(data){
  console.log(data);
$('#news-list .news-list-wrapper').append(data.html);
count += 4;
if (count > data.total){
  $('.view-more-btn').remove();
}
},
});
});
});
</script>