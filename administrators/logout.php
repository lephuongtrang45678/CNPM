<?php
include('../constants.php');
session_destroy();

header('Location:' . SITEURL . 'administrators/login.php');
