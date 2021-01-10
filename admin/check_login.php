<?php
session_start();
return $dang_nhap = isset($_SESSION['admin_login']) ? true : false;