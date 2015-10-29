$(document).ready(function() {
  $('body').on('click', '.quiz-answer-add > a', function(e) {
    e.preventDefault();
    e.stopPropagation();
    addAnswer(e.target);
  });
  $('body').on('click', '.remove-answer', function(e) {
    removeAnswer(e.target);
  });
  $('body').on('click', '.quiz-question-add > button', function(e) {
    addQuestion(e.target);
  });
  $('body').on('click', '.remove-question', function(e) {
    removeQuestion(e.target);
  });
  $('body').on('click', '.quiz-answer-check', function(e) {
    pickAnswer(e.target);
  });
  $('.quiz-question-add > button').click();

  $.validate({
    modules : 'html5',
    validateOnBlur: false, // disable validation when input looses focus
    errorMessagePosition: 'top', // Instead of 'element' which is default
    scrollToTopOnError: true // Set this property to true if you have a long form
  });
});

function addAnswer(target) {
  var index = $(target).closest('.quiz-answer').children().length;
  var fatherIndex = $(target).closest('.quiz-qa-box').children('.quiz-question').children('input').attr("data-index");
  var item = createAnswer(index, fatherIndex);
  $(target).closest('.quiz-answer-add').before(item);
}

function addQuestion(target) {
  var index = $(target).closest('.quiz-qa').children().length;
  var item = createQuestion(index);
  $(target).closest('.quiz-question-add').before(item);
}

function createAnswer(index, fatherIndex) {
  var item = '<li class="quiz-answer-item"></li>';
  var input = '<input data-validation="required" data-validation-error-msg="Bạn chưa điền câu trả lời cho câu hỏi thứ ' + index + '" name="answer[' + fatherIndex + '][' + index + ']" type="text" class="form-control" placeholder="Câu trả lời ' + index + '">';
  var radio = '<input required data-validation-error-msg="Bạn chưa chọn đáp án cho câu hỏi thứ ' + index + '" type="radio" value="' + index + '" name="right-answer[' + fatherIndex + ']" hidden>';
  var check = '<i class="fa fa-check quiz-answer-check"></i>';
  var remove = '<i class="fa fa-times remove-mark remove-answer"></i>';
  return $(item).append($(input), $(radio), $(check), $(remove));
}

function createQuestion(index) {
  var box = '<div class="quiz-qa-box"></div>';
  var question = '<div class="quiz-question"></div>';
  var num = '<span>' + index + '</span>';
  var input = '<input name="question[' + index + ']" data-index="' + index + '" type="text" class="form-control" placeholder="Nhập câu hỏi ở đây">';
  var remove = '<i class="fa fa-times remove-mark remove-question"></i>';
  var answers = '<ul class="quiz-answer"></ul>';
  var answer = createAnswer(1, index);
  var answerAdd = '<li class="quiz-answer-add"><a href=""><i class="fa fa-plus"></i> Thêm câu trả lời</a></li>';
  return $(box).append($(question).append($(num), $(input), $(remove)), $(answers).append($(answer), $(answerAdd)));
}

function removeAnswer(target) {
  if (confirm('Bạn đồng ý xóa câu trả lời này?')) {
    $(target).closest('.quiz-answer-item').remove();
  }
}

function removeQuestion(target) {
  if (confirm('Bạn đồng ý xóa câu hỏi này?')) {
    $(target).closest('.quiz-qa-box').remove();
  }
}

function pickAnswer(target) {
  var box = $(target).closest('.quiz-answer-item');
  $(box).find('input[type="radio"]').attr({
    checked: ''
  });
  $(box).closest('.quiz-answer').find('.checked').removeClass('checked');
  $(box).addClass('checked');
}
