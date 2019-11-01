<?php
if(isset($_GET['cat']))
{
	header('Location:../index.php?cat='.$_GET['cat']);
}
?>