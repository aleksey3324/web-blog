<footer class="footer">
  Все права защищены
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $('.chat__button').click(() => {
    let chat_mess = $('.chat__input').val();
    
    $.ajax({
      url: '/blog-php-work/ajax/chat-mess_add.php',
      type: 'POST',
      cahe: false,
      data: {
        'chat_mess': chat_mess,
      },
      dataType: 'html',
      success: (data) => {
        $('.chat__input').val("");
      }
    });

    setInterval(function() {
    $.ajax({
      url: '/blog-php-work/ajax/get_mess.php',
      type: 'POST',
      cache: false,
      dataType: 'html',
      success: function(data) {
        $(".chat").html(data);
      }
    });
  }, 2000);

  });
</script>