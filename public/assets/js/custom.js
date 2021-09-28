$(document).on('submit', '.database_operation', function(){
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url,data, function(fb){
        var resp =  $.parseJSON(fb);
        if(resp.status=='true')
        {
            alert(resp.message);
            setTimeout(function(){
                window.location.href=resp.reload;
            }, 1000);
        }
        else{
            alert(responce.message);
        }
    })
    return false;
})



// javascript code for category status

$(document).on('click', '.category_status', function(){
    var id =  $(this).attr('data-id');
    // alert(id);
   $.get('/category_status/'+id,function(fb){
       alert('Status Changed Sucessfully');
   })
});


// javacript code for Exam status

$(document).on('click', '.exam_status', function(){
    var id =  $(this).attr('data-id');
   $.get('/exam_status/'+id,function(fb){
       alert('Status Changed Sucessfully');
   })
});


// javascript code for student status 

$(document).on('click', '.student_status', function(){
    var id =  $(this).attr('data-id');
   $.get('/student_status/'+id,function(fb){
       alert('Status Changed Sucessfully');
   })
});



// javascript code for portal status

$(document).on('click', '.portal_status', function(){
    var id =  $(this).attr('data-id');
   $.get('/portal_status/'+id,function(fb){
       alert('Status Changed Sucessfully');
   })
});

// javascript code for portal status

$(document).on('click', '.exam_Qn_status', function(){
    var id =  $(this).attr('data-id');
   $.get('/exam_question_status/'+id,function(fb){
       alert('Status Changed Sucessfully');
   })
});



// javascrip code for timer


	var interval;
	function countdown() {
	  clearInterval(interval);
	  interval = setInterval( function() {
	      var timer = $('.js-timeout').html();
	      timer = timer.split(':');
	      var minutes = timer[0];
	      var seconds = timer[1];
	      seconds -= 1;
	      if (minutes < 0) return;
	      else if (seconds < 0 && minutes != 0) {
	          minutes -= 1;
	          seconds = 59;
	      }
	      else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

	      $('.js-timeout').html(minutes + ':' + seconds);

	      if (minutes == 0 && seconds == 0) { clearInterval(interval);
            $('#kt_form').submit();
            alert('time UP'); }
	  }, 1000);
	}

	$('.js-timeout').text("00:30");
	countdown();
