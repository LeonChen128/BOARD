<?php

include 'lib/define.php';
include 'lib/funcs.php';

unset($_SESSION['user']);

echo '您已成功登出！即將返回登入頁面...';
header('Refresh: 3 url=index.php');