const http = require('http');
//npm install request
const request = require('request');

const apiProxy = http.createServer((req, res)=> {
	// console.log(req.headers);
	const url = 'https://dev.mathplanet.cn/wx'+req.url;
	const options = {
		url
	};

	function callback(error, response, body){
		if(error){
			res.end(error);
		}else{
			const headers = response.headers;
			// for(const key in headers){
			// 	res.setHeader(key, headers[key]);
			// }
			res.writeHead(response.statusCode, headers);
			res.end(body);
		}
	}

	request.get(options, callback);
});

apiProxy.listen(8888, '127.0.0.1', ()=>{
	console.log('服务器运行在8888端口');
});