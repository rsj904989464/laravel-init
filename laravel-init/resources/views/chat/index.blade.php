<div style="padding: 20px; background-color: #F2F2F2;">
    <div class="layui-row" style="margin: 0 auto;">
        <div class="layui-col-md6" style="width: 60%;">
            <div class="layui-card">
                <div class="layui-card-header text-center">聊天群</div>
                <div class="layui-card-body" style="height: 60%">
                    <p class="text-left"><span class="f-16 red-text">用户A：</span> 卡片式面板面板通常用于非白色背景色的主体内</p>
                    <p class="text-right"><span class="f-16 red-text">用户B：</span>卡片式面板面板通常用于非白色背景色的主体内</p>
                </div>

            </div>
            <div class="layui-card">
                <textarea  cols="140" rows="4"></textarea>
                <button type="button" class="layui-btn layui-btn-primary" style="height: 93px;float: right;width: 130px;">发送</button>

            </div>

        </div>

    </div>
</div>
<!--Insert To Footer-->
<script>
    $(function () {
        connect();
    });

    // 连接服务端
    function connect() {
        // 创建websocket
        ws = new WebSocket("ws://127.0.0.1:5000");
        // 当socket连接打开时，输入用户名
        ws.onopen = onopen;
        // 当有消息时根据消息类型显示不同信息
        ws.onmessage = onmessage;
        ws.onclose = function() {
            console.log("连接关闭，定时重连");
            connect();
        };
        ws.onerror = function() {
            console.log("出现错误");
        };
    }

    function onopen() {
        console.log('onopen');
    }
    function onmessage() {
        console.log('onmessage');
    }
</script>