
$('.insert-form').submit(function (e) {
    e.preventDefault();

    var word = $("#word").val();
    var city = $("#regionSelect").val();
    var meaning = $("#meaning").val();
    
    $.ajax({
        url: "insert.php",
        method: "POST",
        data: { word: word, city: city, meaning: meaning },
        success: function (data) {
            $('.msg').fadeIn();
            $('.msg').html(data);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText); 
        }
    });
});


//search part

$(document).ready(function() {
    $("#searchQuery").keyup(function() {
      var query = $(this).val();
      if (query != '') {
        $.ajax({
          url: "search.php",
          method: "POST",
          data: { query: query },
          success: function(data) {
            $('.search-resault').fadeIn(); 
            $('.search-resault').html(data);
          }
        });
      }
    });
  });
  $(document).on('click', function(){  
     $('.search-resault').fadeOut();  
});








