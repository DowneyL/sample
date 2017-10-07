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
            'unique' => '您已签到成功，请勿重复签到。',
            'max' => '请填写正确的联系方式'
        ],
        'contacts' => [
            'required' => '联系人不能为空。',
        ],
        'goods_id' => [
            'required' => '奖品 id 不能为空。',
        ],
        'gname' => [
            'required' => '奖品名称不能为空。',
        ],
        'gimg' => [
            'required' => '奖品图片不能为空。',
        ],
        'gstock' => [
            'required' => '奖品库存不能为空。',
        ],
        'probability' => [
             'required' => '奖品概率不能为空',
        ],
    ]

];
