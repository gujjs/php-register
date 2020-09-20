<?php
session_start();
echo 'you are logged in as '.$_SESSION['username'].'<br>';
echo 'welcome '.$_SESSION['full_name'];