<?php

$db['hostname'] = 'localhost';
$db['username'] = 'root';
$db['password'] = 'root';
$db['database'] = 'test';
$db['dbdriver'] = 'mysqli';
$db['dbprefix'] = '';
$db['pconnect'] = TRUE;
$db['db_debug'] = TRUE;
$db['cache_on'] = FALSE;
$db['cachedir'] = '';
$db['char_set'] = 'utf8';
$db['dbcollat'] = 'utf8_general_ci';
$db['swap_pre'] = '';
$db['autoinit'] = TRUE;
$db['stricton'] = FALSE;

  $connect_error = 'Could not connect to mysql server';
  $mysql_db = mysqli_connect(
    $db['hostname'],
    $db['username'],
    $db['password'],
    $db['database']
  );

$malicious_string = "if(now()%3dsysdate()%2csleep(0)%2c0)/%22%29%20AND%20ROW%288859%2C3283%29%3E%28SELECT%20COUNT%28%2A%29%2CCONCAT%280x716b626271%2C%28SELECT%20%28ELT%288859%3D8859%2C1%29%29%29%2C0x7170766b71%2CFLOOR%28RAND%280%29%2A2%29%29x%20FROM%20%28SELECT%206865%20UNION%20SELECT%208421%20UNION%20SELECT%202211%20UNION%20SELECT%202007%29a%20GROUP%20BY%20x%29%20AND%20%28%22WBfc%22%20LIKE%20%22WBfc'XOR(if(now()%3dsysdate()%2csleep(0)%2c0))OR'%22XOR(if(now()%3dsysdate()%2csleep(0)%2c0))OR%22/-6s-plus/";

$malicious_string = urldecode($malicious_string);

//echo "<pre>"; var_dump($malicious_string); die;

$stmt = mysqli_prepare($mysql_db, "SELECT email from user where email = ?");
$stmt->bind_param('s', $malicious_string);

//echo "<pre>"; var_dump($stmt); die;
$stmt->execute();
$email = '';
$stmt->bind_result($email);
while ($stmt->fetch()) {
  printf ("%s\n", $email);
}
$stmt->close();
$mysql_db->close();
echo "<pre>"; var_dump("DONE"); die;


