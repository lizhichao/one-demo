<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ws</title>
</head>
<body>
<pre>
打开浏览器控制台 send(content)
send('xxxx')
</pre>
<script>
    (function (w) {
        let ws = new WebSocket('ws://' + document.location.hostname + ':8082');
        ws.onclose = function () {
            console.log('ws 关闭了');
        };
        ws.onopen = function () {
            console.log('ws open');
        };
        ws.onmessage = function (d) {
            console.log(d.data);
        };
        w.send = function (data) {
            ws.send(data);
        };
    })(window);
</script>
</body>
</html>