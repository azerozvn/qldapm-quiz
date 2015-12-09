var express = require('express');
var router = express.Router();
var quizCtrl = require('../controllers/quizController');

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Quiz' });
});
router.get('/play',function(req, res){
  res.render('play', {title: 'Quiz | Play'});
});

router.get('/create', function(req, res, next) {
  res.render('create', { title: 'Quiz | Create' });
});

router.post('/create', quizCtrl.createQuiz);
router.get('/get/:link', quizCtrl.getQuiz);

router.get("/test", quizCtrl.test);

module.exports = router;
