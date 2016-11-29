<?php
inlcude('dbcon.php');

mysql_query("UPDATE client_detail SET status=active
WHERE ID= \"$var\" ");

header('Location: http://localhost/super_admin_library/pages/view_admin.php');

?> 