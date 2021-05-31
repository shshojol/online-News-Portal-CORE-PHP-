<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['role']);
session_destroy();
header('location: http://localhost/shojol/news-site/admin/');
