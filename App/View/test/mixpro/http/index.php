<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tpc http websocket 相互通信demo</title>
    <style>
        body{line-height: 1.8;}
    </style>
</head>
<body>
<h1>tpc http websocket 相互通信demo</h1>
<p><a href="/mix/http?code=<?=$code;?>">http轮训</a></p>
<p><a href="/mix/ws?code=<?=$code;?>">websocket</a></p>
<p>
    tcp:连接方法<br>
    telnet 127.0.0.1 8083<br><br>
    send name content<br>
    表示向名字为name的用户发送content信息<br><br>
    send all content<br>
    表示所有用户（包含tcp http websocket用户）发送content信息<br>
</p>
</body>
</html>