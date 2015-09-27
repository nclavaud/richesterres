$(document).ready(function(){

	$('.popup').magnificPopup({
	  type: 'image',
	  zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
	});

	$('.popup-text').magnificPopup({
	  type: 'inline',
	  zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('p');
			}
		}
	});

	var transition = "zoomOut";
	var transition = "fadeOutRight";


	$("#rating").click(function(event) {
        event.preventDefault();

		$("#right").children().each(function(index){
			$(this).addClass('animated '+transition);
			var t = $(this);
			setTimeout(function(){
				t.hide()
			}, 800);
		});

		setTimeout(function(){
			$(".showMe").show();
			$(".showMe").removeClass('hidden');
			$(".showMe").removeClass('animated '+transition);
			$(".showMe").addClass('animated fadeIn');
		}, 1000);

	});

	$('.btn-info').click(function(event) {
        event.preventDefault();

		$(".showMe").fadeOut(1000);
		$(".td-1, .td-2").fadeIn(1200);
		$(".td-1, .td-2").removeClass('animated '+transition);

	});
});
