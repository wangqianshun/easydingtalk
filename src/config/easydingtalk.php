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
        // access_token的提前超时重新获取时间，单位秒
        'access_token_expires' => 180,
        // access_token的文件路径，建议填写绝对路径
        'access_token_file_path' => public_path().'/access_token.json'
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
    ]
];
