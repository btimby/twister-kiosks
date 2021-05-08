const express = require('express');
const app = express();
const PORT = 3000;


app.get('/', (req, res) => {
    res.send('Hello Worldz!');
});

app.listen(PORT, (server) => {
    console.log(`Twister listening at http://localhost:${PORT}`);
});
