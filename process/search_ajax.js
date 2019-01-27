$(document).ready(function() {  

	// Icon Click Focus
	/*$('div.icon').click(function(){
		$('input#search').focus();
	});*/

	// Live Search
	// On Search Submit and Get Results
	function search() {
		var query_value = $('input#search').val();	
		$('b#search-string').html(query_value);	
		if(query_value !== ''){
			$.ajax({
				type: "POST",
				url: "process/search_ajax.php",
				data: { query: query_value },
				cache: false,
				success: function(html){
					$("ul#results").html(html);
				}
			});
		}return false;    
	}

	$("input#search").on("keyup", function(e) {
		// Set Timeout
		clearTimeout($.data(this, 'timer'));
		// Set Search String
		var search_string = $(this).val();
		// Do Search
		if (search_string == '') {
			$("ul#results").fadeOut();
			$('h4#results-text').fadeOut();
		}else{
			$("ul#results").fadeIn();
			$('h4#results-text').fadeIn();
			$(this).data('timer', setTimeout(search(), 500));
		};
	});

});