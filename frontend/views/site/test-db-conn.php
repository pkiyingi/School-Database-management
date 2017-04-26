<?php

use yii\base\Model;
use yii\db\Query;

/*
 * Testing DB connection.
 */
$db = Yii::$app->db;
Yii::$app->db->open();
$tables = $db->createCommand("SHOW TABLES")->queryAll();
?>
<pre>
    <?php
    print_r($tables);
    ?>
</pre>