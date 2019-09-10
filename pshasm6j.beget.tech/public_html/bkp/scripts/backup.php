<?php
// $run = "mv ~/http/bkp/dump.sql ~/http/bkp/dump".time().".sql";
// exec($run);
$run = "mysqldump -u gb_charskie -hmysql86.1gb.ru -p33aea385a gb_charskie > ~/http/bkp/".date('d-m-y_H:i:s').".sql";
exec($run);
$run = "cd ~/http/bkp && ls -t | tail -n+11 | xargs -i rm '{}'";
exec($run);
?>