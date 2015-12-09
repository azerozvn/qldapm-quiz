function encode(str) {
	return new Buffer(str).toString('base64');
}

function decode(str) {
	return new Buffer(str, 'base64').toString('utf8');
}

module.exports = {
	encode: encode,
	decode: decode
};