
# one框架Demo

[框架文档地址](https://www.kancloud.cn/vic-one/php-one/826876)

## 安装

```shell
composer create-project lizhichao/one-demo
```

## 包含

### websocket使用列子

[代码地址](https://github.com/lizhichao/one-demo/tree/master/App/Test/WebSocket)

#### 带路由列子

```
#启动
php App/swoole.php test_ws_router

#测试地址
http://127.0.0.1:8081/ws/router

#打开浏览器控制台 send(url,content)
send('a','xxxx')
```
#### 不带路由例子
  
```
#启动
php App/swoole.php test_ws

#测试地址
http://127.0.0.1:8081/ws

#打开浏览器控制台 send(content)
send('xxxx')
```

   
### orm模型使用列子

[代码地址](https://github.com/lizhichao/one-demo/tree/master/App/Test/Orm)

### tcp使用列子

#### 带路由列子

```
#启动
php App/swoole.php test_tcp_router

```
#### 不带路由例子
  
```
#启动
php App/swoole.php test_tcp

```

### 各种混合协议之间相互通讯列子

#### socket.io （websocket http）

```
#启动globalData
php App/swoole.php global_data

#启动服务
php App/swoole.php socket_io

```

####  websocket、http和tcp、udp混合通讯 （只要swoole支持的协议都可以，这里就不一一举例了）
```
#启动globalData
php App/swoole.php global_data

#启动服务
php App/swoole.php test_all

```

### task任务使用列子

### rpc调用例子

### globalData进程之间内存共享使用列子

### 路由中间件使用列子


## 小提示

`php App/swoole.php xxx`  其实就是启动Config下`xxx.php`配置的swoole服务器 
