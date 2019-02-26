<?php

$conn=@mysqli_connect("localhost","root","","gym") or die(mysqli_error());
mysqli_query($conn, 'set names utf8');
