# SQL injection test

We are trying to see if this particular SQL injection works with your code.

We want to turn on logging to see what query is being executed. Logon to your mysql server. Enter the following commands:
```
SET GLOBAL general_log_file = "/var/log/mysql/query.log";
SET GLOBAL general_log = 'OFF';
```
Now your log file can be tailed from the above location.

Run the code by typing:
```
php injection-test.php
```
