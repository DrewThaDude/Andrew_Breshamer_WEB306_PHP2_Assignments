<?php
require_once("includes/Bootstrap.php");
session_start();
session_destroy();
header("Location: index1.php");
