<?php
/**
 * Created by PhpStorm.
 * User: SparkWorld
 * Date: 3/27/2017
 * Time: 4:21 PM
 */

//date intervals

$sql ="SELECT * FROM table WHERE date_created BETWEEN(date_add(2017-3-01,INTERVAL 10 DAY))";