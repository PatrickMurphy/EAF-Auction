<?php
$sql = mysql_connect("localhost","pmphotog_eaf","almostover13");

if(!$sql)
    die('Could not connect: ' . mysql_error());
    
mysql_select_db('pmphotog_eaf');

$query = 'CREATE TABLE eaf_users (
id int NOT NULL AUTO_INCREMENT,
username varchar(25) NOT NULL,
password varchar(255) NOT NULL,
activated tinyint(1) DEFAULT 0,
date_registered date,
name varchar(255) NOT NULL,
email varchar(255) NOT NULL,
comail varchar(255) NOT NULL,
phone varchar(255),
PRIMARY KEY(id)
)';

if($_GET['exec']==1)
    $result = mysql_query($query);
echo mysql_error();
?>