<?php
// +----------------------------------------------------------------------
// | 钉钉应用设置
// +----------------------------------------------------------------------

return [
    'app' => [
        /**
         * TODO 应用基础信息
         */
        // 当前应用的id
        'agent_id' => '1483086443',
        // 当前应用的app_key
        'app_key' => 'dingmezsm0prf0ji1wcm',
        // 当前应用的app_secret
        'app_secret' => 'Xcnc-dk6ToLM2Wdu5wuRr4ghjYUu1EPUPFE3CAm5xL9e-A8uPRmWHeb0CvIX4gb_',

        /**
         * TODO 当前应用的access_token信息
         */
        'access_token' => [
            // access_token的提前超时重新获取时间，单位秒
            'expires' => 180,
            // access_token的文件路径，建议填写绝对路径
            'file_path' => public_path().'/access_token.json',
        ],

        /**
         * TODO 回调信息
         */
        'callback_info' => [
            // 当前应用的加密
            'aes_key' => 'S87LxPjrNk6rgp1chcZsFXlNBleVAQqeaDkylQJ2S5r',
            // 当前应用的签名
            'token' => 'Yu6bwoS6E5gKLIn4wZYM9ru4K3L'
        ],
    ],
    'api' => [
        // 请求域名
        'domain' => 'https://oapi.dingtalk.com',

        // 获取token接口
        'get_token' => '/gettoken',

        // 发送普通消息接口
        'ordinary_message' => [
            'send_to_conversation' => '/message/send_to_conversation'
        ],

        // 发送工作通知接口
        'work_notification' => [
            'corpconversation' => '/topapi/message/corpconversation/asyncsend_v2',
            'update_status_bar' => '/topapi/message/corpconversation/status_bar/update',
            'getsendprogress' => '/topapi/message/corpconversation/getsendprogress',
            'getsendresult' => '/topapi/message/corpconversation/getsendresult',
            'recall' => '/topapi/message/corpconversation/recall'
        ],

        // 获取推送失败的事件列表
        'callback_failed_lists'=>'/call_back/get_call_back_failed_result'
    ]
];
