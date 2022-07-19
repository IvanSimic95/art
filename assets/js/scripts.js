
$(document).ready(function(){
  $('.bars').click(function(){
      $('#main_menu').toggle();
  })

  var current_page = $('body').attr('id');
  $('#main_menu li').each(function(){
    if ($(this).hasClass(current_page)) {
      $(this).addClass('current_page');
    }
  })
  
  var current_page2 = $('body').attr('id');
  $('#mobile-menu li').each(function(){
    if ($(this).hasClass(current_page2)) {
      $(this).addClass('active');
    }
  })
 
	
	
  
  $(window).scroll(function (event) {
      var scroll = $(window).scrollTop();
      if (scroll > 50) {
        $('#header').addClass('fixed_header');
        $('body').addClass('has_fixed_header');
      }else{
        $('#header').removeClass('fixed_header');
        $('body').removeClass('has_fixed_header');
      }
  })
  $('.question').click(function(){
      $('.answer').hide();
      $(this).next().slideDown();
  })
  $('.tab1').click(function(){
    $('.table_headers h3').removeClass('active');
    $(this).addClass('active');
    $('.review_tab').show();
    $('.add_review_tab').hide();
	})
	$('.tab2').click(function(){
		$('.table_headers h3').removeClass('active');
		$(this).addClass('active');
		$('.review_tab').hide();
		$('.add_review_tab').show();
	})
})


$('.chat').click(function(){
    var id = $(this).attr('id').replace(/talkjs-/, '');
    $('#talkjs-container-' + id).parent().show();
    var pannels = 20
    jQuery('.chat_box').each(function(){
        if (jQuery(this).is(':visible') ) {
            jQuery(this).css('right', pannels + 'px')
            pannels = pannels + 440;
        }

    })
})

$('.chat_box .fas').click(function(){
    $(this).parent().hide();
    var pannels = 20
    jQuery('.chat_box').each(function(){
        if (jQuery(this).is(':visible') ) {
            jQuery(this).css('right', pannels + 'px')
            pannels = pannels + 440;
        }

    })
})
