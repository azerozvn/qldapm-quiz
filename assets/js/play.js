$(document).ready(function(){
	$('body').on('click', '.play-answer-item > .btn-custom', function(e){
		pickAnswer(e.target);
	});
});

function pickAnswer(target){
	var list = $(target).closest('.play-answer');
	$(list).addClass('picked');
	var item = $(target).closest('.play-answer-item')
	if (!($(item).hasClass('right'))){
		$(item).addClass('wrong');
	};
	list.find('.btn-custom').attr({
		disabled: ''
	});
}