<?php
return[
    'custom' => [
        'email' => [
            'required' => '邮箱地址不能为空。',
        ],
        'corporate' => [
            'required' => '公司名称不能为空。',
        ],
        'tel' => [
            'required' => '联系方式不能为空。',
            'unique' => '您已签到成功，请勿重复签到。'
        ],
        'contacts' => [
            'required' => '联系人不能为空。',
        ],
    ]
];
