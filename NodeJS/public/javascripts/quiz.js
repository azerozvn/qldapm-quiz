var quiz = angular.module('quiz', ['ngRoute']);

quiz.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: '/create',
            controller: 'createPageController'
        }).
        when('/play/:link', {
            templateUrl: '/play',
            controller: 'playPageController'
        }).
        otherwise({
            redirectTo: '/'
        });
}]);

quiz.controller('createPageController', ['$scope', '$http', function ($scope, $http) {
    $scope.quiz = {};

    $scope.init = init();
    $scope.removeAnswer = removeAnswer;
    $scope.createAnswer = createAnswer;
    $scope.answerPicked = answerPicked;
    $scope.createQuestion = createQuestion;
    $scope.removeQuestion = removeQuestion;
    $scope.quizSubmit = quizSubmit;

    var validationArray = [];


    function init() {
        $scope.quiz = {
            title: '',
            description: '',
            questionList: [{
                title: '',
                answerList: [{
                    title: '',
                    isCorrect: false
                }]
            }]
        };
    }

    function removeAnswer(answerList, index) {
        if (answerList.length > 1)
            answerList.splice(index, 1);
    }

    function createAnswer(answerList) {
        answerList.push({
            title: '',
            isCorrect: false
        });
    }

    function answerPicked(answerList, index) {
        answerList.forEach(function (answer) {
            answer.isCorrect = false;
        });
        answerList[index].isCorrect = true;
        console.log(index);
    }

    function createQuestion(questionList) {

        questionList.push({
            title: '',
            answerList: [{
                title: '',
                isCorrect: false
            }]
        });
    }

    function removeQuestion(questionList, index) {
        if (questionList.length > 1)
            questionList.splice(index, 1);
    }

    function quizSubmit() {
        showPleaseWait();
        $http.post("/create", {
            quiz: $scope.quiz
        }).success(function (result) {
            var code = result.code;
            var message = result.message;
            var data = result.data;

            hidePleaseWait();
            switch (code) {
                case 201:
                    init();
                    showSuccess(data);
                    break;
                case 400:
            }
        });
    }

    var pleaseWaitDiv = $('<div class="modal fade" data-backdrop="static" data-keyboard="false"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h2 class="modal-title">Đang cập nhật giỏ hàng...</h2> </div> <div class="modal-body"> <div class="progress"> <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 100%;"></div> </div> </div></div> </div> </div>');

    var successTemplate = '<div class="modal fade"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-body"> <div class="create-heading text-center"> <h1>Tạo Quiz thành công</h1> <b><i class="fa fa-exclamation-triangle"></i></b> <span>Xin chúc mừng Quiz của bạn đã được tạo thành công!</span><br> <span>Đây là link của bạn:</span><br> <input class="form-control" type="text" readonly value="{{copyLink}}"><br> <a href="{{playLink}}"> <span class="fa fa-link"></span> Play quiz</a><br> </div> </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button> </div> </div> </div> </div>';

    var errorTemplate = '<div class="modal fade"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h4 class="modal-title">Thông báo</h4> </div> <div class="modal-body"> <h4>{{message}}</h4> </div> <div class="modal-footer"> <button type="button" class="button button-black" onclick="backToHome()">Đóng</button> </div> </div> </div> </div>';

    function showPleaseWait() {
        pleaseWaitDiv.modal('show');
    }

    function hidePleaseWait() {
        pleaseWaitDiv.modal('hide');
    }

    function showSuccess(data) {
        var modal = successTemplate
            .replace('{{copyLink}}', window.location.host + "/#/play/" + data.link)
            .replace('{{playLink}}',"/#/play/" + data.link);
        $(modal).modal('show');
    }
}]);


quiz.controller('playPageController', ['$scope', '$http', '$routeParams', function ($scope, $http, $routeParams) {
    var link = $routeParams.link;

    $scope.quiz = {};
    $scope.total = 0;
    $scope.totalRight = 0;
    $scope.init = init;
    $scope.answerPicked = answerPicked;

    function init(){
        $http.get("/get/"+link).success(function (result) {
            var code = result.code;
            var message = result.message;
            var quiz = result.data;

            switch (code) {
                case 200:
                    $scope.quiz = quiz;
                    $scope.total = quiz.questionList.length;
                    break;
                case 404:
                    break;
            }

        });
    }
    function answerPicked(question, answer, index){
        console.log(index,answer.isCorrect);
        if(question.picked == true) {
            return;
        }
        question.picked = true;
        if(answer.isCorrect) {
            $scope.totalRight += 1;
            answer.correctPicked = true;
        }else{
            answer.wrongPicked = true;
        }
    }
}]);