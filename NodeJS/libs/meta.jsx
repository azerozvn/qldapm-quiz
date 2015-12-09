var r = require('rethinkdb');
var connect = require('./connect');
var config = require('../lib/config');
var dbName = config.rethinkdb.db;

async function get(id) {
	var connection = await connect();
	var result = await r.db(dbName).table("meta").get(id).run(connection);
	return result && result.value;
}

async function set(id, value) {
	var connection = await connect();
	var result = await r.db(dbName).table("meta").insert({
		id: id,
		value: value
	}, {conflict: 'replace'}).run(connection);
	return result;
}

module.exports = {
	set,
	get
}