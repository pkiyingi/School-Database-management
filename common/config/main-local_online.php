<?php

use kartik\mpdf\Pdf;

return [
    'name' => 'URA STAFF SACCO LTD',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysacco.ura.go.ug;dbname=app_saccomanager',
           'username' => 'urasacco',
            'password' => 'sacko@123@#',
           'charset' => 'utf8',
       ],
  'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.ura.go.ug',
                'username' => "ura.local\\uraifms",
                'password' => "Beta1#1234",
                'port' => '25',
                'encryption' => 'tls',
                 'streamOptions' => [
                    'ssl' => [
                        'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    // PDF global configuration
//        'pdf' => [
//            'class' => Pdf::classname(),
//            'format' => Pdf::FORMAT_A4,
//            'orientation' => Pdf::ORIENT_PORTRAIT,
//            'destination' => Pdf::DEST_BROWSER,
//        ],
    ],
    //MODULES          
    'modules' => [
    ],
];
