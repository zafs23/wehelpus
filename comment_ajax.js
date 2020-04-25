
$(document).ready(function() {
  //$(function() {

  $("#comment_form").submit(function(e) { // when submit is clicked
    e.preventDefault(); // dont reload the page
    
    //var values = $("#comment_form").serialize(); // collect form information

    var comment = $("#comment").val(); // get the comment from the input field
     
    if(comment == '') {
        $('#comment_messages').html('Please both fields');
    } else if( comment !== '') {
        $('#comment_messages').html('');

    }

    $("#comment_form")[0].reset(); // reset the form
    
    //$('#list ol').prepend("<li>Comment : " + comment + "</li>"); // adds a row to the table already on the page
    // "ol#ol"
    $.ajax({ // perform AJAX call to PHP
      type: "POST", 
      url: "comment.php",
      data: '&comment='+comment,
      success: function() { // when HTTP 200 is returned from url
        $("#list").append("<br>Comment : " + comment + "</br>");
      },
      error: function () { // anything besides 200 is returned from url
        alert("FAILURE");
      }
    });

  });
//});
});
