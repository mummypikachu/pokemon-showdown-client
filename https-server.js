const https = require('https');
const fs = require('fs');
const httpServer = require('http-server');

const options = {
  key: fs.readFileSync('key.pem'),
  cert: fs.readFileSync('cert.pem')
};

const server = https.createServer(options, httpServer.createServer());

server.listen(8080, () => {
  console.log('HTTPS server listening on port 8080');
});
