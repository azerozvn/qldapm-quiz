var config = require('./config.jsx');
var r = require('rethinkdb');

var dbName = config.rethinkdb.db;
var tableList = config.rethinkdb.tableList;

async function main() {
	var conf = {
		"host": config.rethinkdb.host,
		"port": config.rethinkdb.port
	};
	var connection = await r.connect(conf);

	try {
		await r.dbCreate(dbName).run(connection);
	}
	catch(e) {
		console.log('Databse "' + dbName + '" is exsit!');
	}
	for (let tb of tableList) {
		let fail = false;

		try {
			await r.db(dbName).tableCreate(tb).run(connection);
		}
		catch(e) {
			// console.error(e.stack);
			fail = true;
		}

		if (fail) {
			console.log('create table "' + tb + '" fail!');
		} else {
			console.log('create table "' + tb + '" success!');
		}
	}

	// create index product.collections for finding product has at least 1 collection id in id array
	var productIndexs = await r.db(dbName).table('quiz').indexList().run(connection);
	if(productIndexs.indexOf("link") < 0 ) {
		await r.db(dbName).table('quiz').indexCreate("link").run(connection);
		console.log('create index: link for table quiz success');
	}else{
		console.log('create index: link for table quiz fail');
	}ink

	console.log('db_init done');
}

console.log('run db_init');
main();
