<?php

		if(!isset($_SESSION))
		{  	session_start();	}			//�� session �禡, �ݥΤ�O�_�w�g�n���F

		require_once("../../connMysql.php");			//�ޥ�connMysql.php �ӳs����Ʈw
		
		require_once("login_check.php");
		
		$path = '../';
		
		if ( isset($_POST['name']) && isset($_GET['basic_path']) )			//�L�צp��@�w�|�� basic_path
		{
			$path = $path . $_GET['basic_path']."/".$_POST['name'];
			mkdir($path);
		}	
		else
		{
			echo "nothing value";
		}
		
		echo "$path";
		
		if ( false !== ($rst = strpos($_GET['basic_path'], "user_upload_space")) )		//�b�ڪ��Ŷ�
			header("Location: my_upload_space.php?basic_path=".$_GET['basic_path']); 
		else
			header("Location: group_upload_space.php?basic_path=".$_GET['basic_path']);
?>