<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>websocket demo</title>
</head>
<body>
请在控制台操作和查看<br>
方法：send(name,content);向某人发信息<br>
方法：send('all',content);广播<br>
<script>
    (function (w) {
        let user = <?php echo json_encode($users); ?>;
        let ws = new WebSocket('ws://'+document.location.hostname+':8082');
        ws.onclose = function () {
            console.log('ws 关闭了');
        };
        ws.onopen = function () {
            console.log('ws open');
        };
        ws.onmessage = function (d) {
            console.log(d.data);
            var o = JSON.parse(d.data.replace(/\n/,''));
            if(o.v === 1){ //用户加入
                user[o.n] = 1;
                console.log('用户加入'+o.n,user);
            }else if(o.v === 2){ //用户退出
                delete user[o.n];
                console.log('用户退出'+o.n,user);
            }else if(o.v === 3){ //消息
                console.log('收到消息',o.n);
            }else if(o.v === 4){
                user = o.n;
            }else{
                console.log('else');
            }
        };
        w.send = function (name,content) {
            if(user[name] || name == 'all'){
                ws.send(JSON.stringify({t:3,n:name,d:content}));
            }else{
                console.warn('不存在用户:'+name);
            }
        };
    })(window);
</script>
</body>
</html>