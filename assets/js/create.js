$(document).ready(function(){
	$('body').on('click', '.quiz-answer-add > a', function(e){
		e.preventDefault();
		e.stopPropagation();
		addAnswer(e.target);
	});
	$('body').on('click', '.remove-answer', function(e){
		removeAnswer(e.target);
	});
	$('body').on('click', '.quiz-question-add > button', function(e){
		addQuestion(e.target);
	});
	$('body').on('click', '.remove-question', function(e){
		removeQuestion(e.target);
	});
	$('body').on('click', '.quiz-answer-check', function(e){
		pickAnswer(e.target);
	});
});

function addAnswer(target){
	var index = $(target).closest('.quiz-answer').children().length;
	var item = createAnswer(index);
	$(target).closest('.quiz-answer-add').before(item);
}

function addQuestion(target){
	var index = $(target).closest('.quiz-qa').children().length;
	var item = createQuestion(index);
	$(target).closest('.quiz-question-add').before(item);
}

function createAnswer(index){
	var item = '<li class="quiz-answer-item"></li>';
	var input = '<input type="text" class="form-control" placeholder="Câu trả lời '+ index +'">';
	var radio = '<input type="radio" name="question-i-choice-y" hidden>';
	var check = '<i class="fa fa-check quiz-answer-check"></i>';
	var remove = '<i class="fa fa-times remove-mark remove-answer"></i>';
	return $(item).append($(input),$(check),$(remove));
}

function createQuestion(index){
	var box = '<div class="quiz-qa-box"></div>';
	var question = '<div class="quiz-question"></div>';
	var num = '<span>'+ index +'</span>';
	var input = '<input type="text" class="form-control" placeholder="Nhập câu hỏi ở đây">';
	var remove = '<i class="fa fa-times remove-mark remove-question"></i>';
	var answers = '<ul class="quiz-answer"></ul>';
	var answer = createAnswer(1);
	var answerAdd = '<li class="quiz-answer-add"><a href=""><i class="fa fa-plus"></i> Thêm câu trả lời</a></li>';
	return $(box).append($(question).append($(num), $(input), $(remove)), $(answers).append($(answer), $(answerAdd)));
}

function removeAnswer(target){
	if (confirm('Bạn đồng ý xóa câu trả lời này?')){
		$(target).closest('.quiz-answer-item').remove();
	}
}

function removeQuestion(target){
	if (confirm('Bạn đồng ý xóa câu hỏi này?')){
		$(target).closest('.quiz-qa-box').remove();
	}
}

function pickAnswer(target){
	var box = $(target).closest('.quiz-answer-item');
	$(box).find('input[type="radio"]').attr({
		checked: ''
	});
	$(box).closest('.quiz-answer').find('.checked').removeClass('checked');
	$(box).addClass('checked');
}