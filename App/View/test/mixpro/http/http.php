<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>http 通信 </title>
    <script src="//cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/json2/20150503/json2.min.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            list-style: none;
            font-style: normal;
            outline: 0;
            vertical-align: middle;
        }
        body {
            font: 16px/1.8 sans-serif;
            color: #333;
            background-color: #e2e2e2;
        }
        #content, form {
            width: 98%;
            margin: 0 auto;
        }
        #content {
            height: 360px;
            background-color: #fff;
            overflow: scroll;
            margin-bottom: 10px;
        }
        form .a {
            height: 55px;
        }
        form .a1 {
            float: left;
            width: 90px;
        }
        form .a2 {
            margin-left: 95px;
        }
        form textarea {
            width: 98%;
            height: 45px;
            padding: 3px;
        }
        form select {
            width: 90px;
            height: 53px;
            padding: 0 2px;
        }
        form .b {
            text-align: center;
        }
    </style>
</head>
<body>
<div>
    <div id="content"><p>我的name:<?= $name; ?></p></div>
    <form onsubmit="return send(this)">
        <div class="a">
            <div class="a1">
                <select size="3" name="n">
                    <option value="all">all</option>
                    <?php foreach ($list as $n => $v) {
                        echo '<option value="', $n, '">', $n, '</option>';
                    } ?>
                </select>
            </div>
            <div class="a2">
                <textarea name="d"></textarea>
            </div>
        </div>
        <div class="b">
            <input type="submit" value="send">
        </div>
    </form>
</div>
<script>
    var console = console || {log:function (da) {
            $('#content').append($('<p>'+JSON.stringify(da)+'<p>'));
        }};
    function send(t) {
        $.post('/send',$(t).serialize(), function (da) {
            // console.log(da);
        });
        t.d.value = '';
        return false;
    }
    function getData(){
        var sel = $('.a1>select');
        $.get('/get/data', 'ss='+(new Date()).getTime(), function (r) {
            var da = r.res;
            // console.log(r);
            for (var i = 0; i < da.length; i++) {
                if(da[i].v == 1){
                    var ext = 0;
                    for (var j = 0; j <  sel[0].options.length; j++) {
                        if (sel[0].options[j].value == da[i].n) {
                            ext = 1;
                        }
                    }
                    if(ext == 0){
                        sel[0].options.add(new Option(da[i].n, da[i].n));
                    }
                }else if(da[i].v == 2){
                    for (var j = 0; j <  sel[0].options.length; j++) {
                        if (sel[0].options[j].value == da[i].n) {
                            sel[0].options.remove(j);
                            break;
                        }
                    }
                }else if(da[i].v == 3){
                    $('#content').append($('<p>'+da[i].n+'<p>'));
                }
            }
            setTimeout(function () {
                getData();
            },10);
        }, 'json');
    }
    getData();
</script>
</body>
</html>