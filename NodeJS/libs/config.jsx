var fs = require('fs');
var path = require('path');

var configFilePath = process.env.CONFIG || path.join(__dirname, '../config.json');

var configFile = fs.readFileSync(configFilePath);
var config = JSON.parse(configFile);
console.log("configFile:", config);

module.exports = config;
