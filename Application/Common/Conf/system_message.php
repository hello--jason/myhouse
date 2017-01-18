<?php
return array(
    'dang_assess_passed'        => array(
        'title'     => '在线初评结果提醒',
        'content'   => '您提交的当品【<##dang_name##>】已通过初评，预计可典当金额：<##amount##>元，请尽快进行确认申请操作，7日内未确认将自动取消。'
    ),
    'dang_assess_unpassed'      => array(
        'title'     => '在线初评结果提醒',
        'content'   => '很遗憾，您提交的当品【<##dang_name##>】未能通过初评。如有疑问，请咨询在线客服。'
    ),
    'dang_appraisal_passed'     => array(
        'title'     => '实物鉴定结果提醒',
        'content'   => '您的当品【<##dang_name##>】已通过典当鉴定，最终典当金额：<##amount##>元，请尽快进行确认典当操作，3日内未确认将自动取消。'
    ),
    'dang_appraisal_unpassed'   => array(
        'title'     => '实物鉴定结果提醒',
        'content'   => '很遗憾，您的当品【<##dang_name##>】未能通过典当鉴定，我们将尽快退还您的当品。如有疑问，请咨询在线客服。'
    ),
    'dang_loan'                 => array(
        'title'     => '放款成功提醒',
        'content'   => '您好，您的当品【<##dang_name##>】已成功放款至您尾号【<##card_number##>】的银行卡，请及时查收。如有疑问，请咨询在线客服。'
    ),
    'dang_dang_cancel'          => array(
        'title'     => '典当取消提醒',
        'content'   => '您好，您的当品【<##dang_name##>】已取消典当，我们将尽快退还您的当品。如有疑问，请咨询在线客服。'
    ),
    'dang_chupin_cancel'          => array(
        'title'     => '初评取消提醒',
        'content'   => '您好，您的当品【<##dang_name##>】已取消初评。如有疑问，请咨询在线客服。'
    ),
    'dang_redeem_back'          => array(
        'title'     => '赎当提醒',
        'content'   => '您好，您发起的赎当【<##dang_name##>】已办理，当品已寄出，运单号：[<##express_num##>]。'
    ),
    'dang_continue_passed'      => array(
        'title'     => '续当审核结果提醒',
        'content'   => '您好，您发起的当品【<##dang_name##>】续档申请已通过审核，请及时确认续当，支付续档费用，3日内未确认将自动取消。'
    ),
    'dang_continue_unpassed'    => array(
        'title'     => '续当审核结果提醒',
        'content'   => '很遗憾，您发起的当品【<##dang_name##>】续当申请未能通过审核。如有疑问，请咨询在线客服。。'
    ),
    'dang_will_done'            => array(
        'title'     => '还款提醒',
        'content'   => '您好，您的当品【<##dang_name##>】的赎当日期为【<##redeem_date##>】，请及时进行赎（续）当，逾期将额外收取费用。如您已赎（续）当，请忽略。'
    ),
    'dang_overdue'              => array(
        'title'     => '逾期提醒',
        'content'   => '您好，您的当品【<##dang_name##>】的最后赎当日期为【<##redeem_date##>】，当前已逾期。逾期5天后，系统将自动进行绝当处理。'
    ),
    'dang_done'                 => array(
        'title'     => '绝当提醒',
        'content'   => '您好，您的当品【<##dang_name##>】已绝当，平台将按法律规定处理绝当品。如有疑问，请咨询在线客服。'
    ),
    //实名认证
    'user_name_v_passed'        => array(
        'title'     => '实名认证提醒',
        'content'   => '您好，您的实名认证已通过平台审核。'
    ),
    'user_name_v_unpassed'      => array(
        'title'     => '实名认证提醒',
        'content'   => '您好，您的实名认证未能通过审核：证件照片不规范。请按示例要求上传手持身份证照片，要求证件信息清晰可见且无遮挡，请勿添加无关水印。'
    ),
);