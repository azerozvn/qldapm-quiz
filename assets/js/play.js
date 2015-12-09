$(document).ready(function(){
	$('body').on('click', '.play-answer-item > .btn-custom', function(e){
		pickAnswer(e.target);
	});
	totalHTML.innerHTML = total;
});

var rightHTML = $("#right")[0];
var totalHTML = $("#total")[0];
var right = 0;
var total =answers.length;
var remain = total;

function pickAnswer(target){
	var answer = parseInt(target.getAttribute('data-index'));

	var list = $(target).closest('.play-answer');
	$(list).addClass('picked');
	var item = $(target).closest('.play-answer-item');
	// if (!($(item).hasClass('right'))){
	// 	$(item).addClass('wrong');
	// };
	if(answers.indexOf(answer) > -1){
		$(item).addClass('right');
		rightHTML.innerHTML = ++right;
	}else{
		$(item).addClass('wrong');
	}
	list.find('.btn-custom').attr({
		disabled: ''
	});
	remain--;
	if (remain <= 0){
		// $("#result-total").html(right + "/" + total);
		// console.log(right + "/" + total);
		// $('#result-modal').modal('show');
		window.location.href = window.location.href+"#result"; 
	}
}
