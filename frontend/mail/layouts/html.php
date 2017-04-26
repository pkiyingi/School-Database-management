<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <title><?= Html::encode($this->title) ?></title>
        <meta name="viewport" content="width=device-width"/>
        <?php $this->head() ?>
    </head>
</head>
<body>
    <?php $this->beginBody() ?>
    <table class="body" style="width:100%;">
        <tr>
            <td class="center" align="center" valign="top">
                <center>

                    <table class="row header" style="width:100%;">
                        <tr>
                            <td class="center" align="center">
                                <center>

                                    <table class="container" style="background:#104F9F none repeat scroll 0% 0% !important;width:100%;height:50px;">
                                        <tr>
                                            <td class="wrapper last">

                                                <table class="twelve columns">
                                                    <tr>
                                                        <td class="six sub-columns">
                                                            <img src="http://legalcasetracker.com/logos/casetracker.fw.png" style="max-height: 45px !important;float: left;"/>
                                                        </td>
                                                        <td class="six sub-columns last" style="text-align:right; vertical-align:middle;">
                                                            <h2 class="template-label" style="color:#fff !important">URA STAFF SACCO LTD</h2>
                                                        </td>
                                                        <td class="expander"></td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                    </table>

                                </center>
                            </td>
                        </tr>
                    </table>

                    <table class="container" style="width:100%;">
                        <tr>
                            <td>

                                <table class="row">
                                    <tr>
                                        <td class="wrapper last">

                                            <table class="twelve columns" style="width:100%;">
                                                <tr>
                                                    <td>
                                                        <?= $content ?>
                                                    </td>
                                                    <td class="expander"></td>
                                                </tr>
                                            </table>

                                        </td>
                                    </tr>
                                </table>
                                <table class="row footer" style="width:100%;">
                                     <tr>
        <td style="color:#068;background:#A7BEDB;text-align:center;padding:10px;border-top:#104F9F 2px solid">This email was automatically sent by the <b>URA STAFF SACCO </b> Management System. Please do not reply</td>
    </tr>
                                                                </table>
                                                                <?php $this->endBody() ?>
                                                                </body>
                                                                </html>
                                                                <?php $this->endPage() ?>
