
# one框架Demo

[框架文档地址](https://www.kancloud.cn/vic-one/php-one/826876)

## 安装

```shell
composer create-project lizhichao/one-demo
```

## 包含

1. [websocket使用列子](https://github.com/lizhichao/one-demo/tree/master/App/Test/WebSocket)

   * 带路由列子
   
   ```
    #启动
    php App/swoole.php test_ws_router
    
    #测试地址
    http://127.0.0.1:8081/ws/router
    
    #打开浏览器控制台 send(url,content)
    send('a','xxxx')
   ```
   * 不带路由例子
      
   ```
    #启动
    php App/swoole.php test_ws
    
    #测试地址
    http://127.0.0.1:8081/ws
    
    #打开浏览器控制台 send(content)
    send('xxxx')
   ```

   
2. [orm模型使用列子](https://github.com/lizhichao/one-demo/tree/master/App/Test/Orm)

3. tcp使用列子

4. websocket、http和tcp、udp混合协议之间相互通讯列子

5. task任务使用列子

6. rpc调用例子

7. globalData进程之间内存共享使用列子

8. 路由中间件使用列子
