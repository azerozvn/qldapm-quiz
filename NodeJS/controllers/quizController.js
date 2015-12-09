var config = require('../libs/config.jsx');
var r = require('rethinkdbdash')(config.rethinkdb);
var diacritics = require('diacritic');

async function createQuiz(req, res) {
  console.log("------CREATE QUIZ------");
  try {
    var quiz = req.body.quiz;
    console.log(quiz);
    quiz.id = new Date().getTime();
    let result = await r.table("quiz").insert(quiz, {
      conflict: 'update'
    }).run();
    var linkClean = diacritics.clean(quiz.title).toLowerCase().split(" ").slice(0,5).join("-") +"-" + quiz.id;

    quiz.link = linkClean;
    result = await r.table("quiz").insert(quiz, {
      conflict: 'update'
    }).run();

    res.send({
      data: {
        title: quiz.title,
        link : linkClean
      },
      code: 201,
      message: 'Tạo quiz thành công!'
    });
  } catch (e) {
    console.log(e);
    res.send({
      data: null,
      code: 400,
      message: 'Dữ liệu gửi lên không đúng!'
    });
  }

}

async function getQuiz(req, res) {
  console.log("----GET QUIZ-----");
  console.log(req.params);
  var link = req.params.link;
  var quiz = await r.table('quiz').getAll(link, {index: "link"}).run();

  if(quiz.length > 0) {
    res.send({
      data: quiz[0],
      code:200,
      message: 'quiz'
    });
  }else{
    res.send({
      data: {},
      code:404,
      message: 'not found'
    });
  }

  /// CODE HERE;

}

function test(req, res) {
  res.send("HELLO< THIS IS TEST METHOD");
}

module.exports = {
  createQuiz,
  getQuiz,
  test
};
