<?php
include 'fungsi.php';
 
 
delete($konek, $_GET['id']);
header("Location: /aplikasidatadevaccto");