<?php

include './config/connection.php';
session_start();

session_destroy();
header("location:index.php");
