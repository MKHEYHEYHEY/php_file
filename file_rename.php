<?php

		if(!isset($_SESSION))
		{  	session_start();	}			//�� session �禡, �ݥΤ�O�_�w�g�n���F

		require_once("../../connMysql.php");			//�ޥ�connMysql.php �ӳs����Ʈw
	
		require_once("login_check.php");
		
		$rename = 1;
		
		$basic_path = $_GET['basic_path'];
		
		$new_name = $_POST['new_file_name'];
		
		$old_name = $_POST['old_file_name'];
		
		$path = '../';
		
		if ( isset($_POST['old_file_name']) && isset($_POST['new_file_name']) )
		{
			
			$path = $path . $basic_path;
			
			if ($opendir = opendir($path))	//�s�ɦW���i�H��{���ɮת��W�r�@��}
			{
				while (($file = readdir($opendir)) !==FALSE)
				{	
					if ($file == $_POST['new_file_name'])
					{
						echo "file name already exists";
						$rename = 0;
						break;
					}
				}
			}
			if ($rename == 1)
			{
				$old_name = $path . "/" . $old_name;
				$new_name = $path . "/" . $new_name;
				if (rename($old_name,$new_name) )	// (rename($a,$b)   $a=����ɦW  , $b=�s���ɦW
					echo "rename success!";
			}
		}
		
		
		
		if ( false !== ($rst = strpos($_GET['basic_path'], "user_upload_space")) )		//�b�ڪ��Ŷ�
			header("Location: my_upload_space.php?basic_path=".$_GET['basic_path']); 
		else
			header("Location: group_upload_space.php?basic_path=".$_GET['basic_path']);


?>