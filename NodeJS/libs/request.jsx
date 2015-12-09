import request from 'request';

function init(options) {
    var opt = {};
    // default using json
    opt = {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    };

    for (let i in options) {
        if (options.hasOwnProperty(i)) {
            opt = options;      
        }
    }


    function makeOptions(method) {
        var options = {};
        for (let i in opt) {
            if (opt.hasOwnProperty(i)) {
                options[i] = opt[i];    
            }
        }
        options.method = method;
        return options;
    }

    function req(method) {
        return function(url, body) {
            let options = makeOptions(method);
            options.url = url;
            if (typeof body === 'object') {
                options.json = true;
                options.body = body;
            }
            console.log(new Date() + ' ' + method.toUpperCase() +': ' + url);
            if (body) {
                console.log(body);    
            }
            return new Promise(function(resolve, reject) {
                request(options, function (err, res, result) {
                  if (err) {
                    return reject(err);
                  }

                  var contentType = options.headers['Content-Type'] || options.headers['content-type'] || "json";
                  contentType = contentType.toLowerCase();
                  
                  try {
                    result = JSON.parse(result);
                  }
                  catch (e) {
                    
                  }
                    
                  // console.log(result);
                  console.log('------------------------------');
                  
                  return resolve(result);
                });
            });
        };
    }

    let methods = {};
    ['get', 'post', 'put', 'delete'].map(function(method) {
        methods[method] = req(method);
    });

    return methods;
}


module.exports = function(options) {
    return init(options);
};