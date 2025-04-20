<?php

function query($query, $data = [])
{
	$username = "quicklite_user";
	$password = ')-B~9Y6TaTsdmwM';
	$host = "freephptutorials.ipagemysql.com";

	if($_SERVER['SERVER_NAME'] == 'localhost')
	{

		$con = mysqli_connect('localhost','root','','quickcodeUI_db');
		
	}else{

		$con = mysqli_connect($host,$username,$password,'quicklite_db');
	}

	$res = [];
	foreach ($data as $key => $value) {
		
		$query = str_replace(":".$key." ","'".addslashes($value)."'",$query);
	}

	$result = mysqli_query($con, $query);
	if(!is_bool($result))
	{
		while ($row = mysqli_fetch_assoc($result)) {
			$res[] = (object)$row;
		}
	}

	if(!empty($res))
		return $res;
 
	return false;
}

function get_thumbnail($src_image_path, $max_size = 200)
{
	if(file_exists($src_image_path)){
		$parts = explode(".", $src_image_path);
		$ext = end($parts);

		$dst_image_path = preg_replace("/\.{$ext}$/", "_thumbnail.".$ext, $src_image_path);
		if(file_exists($dst_image_path))
			return $dst_image_path;

		if($src_image_path != $dst_image_path)
		{
			copy($src_image_path, $dst_image_path);


			if($ext == 'png')
				$max_size = round($max_size / 2);

			crop_image($dst_image_path, $max_size);
			return $dst_image_path;
		}
	}

	return $src_image_path;
}

function crop_image($src_image_path, $max_size = 300)
{
	// code...
	if(file_exists($src_image_path)){

		$type = mime_content_type($src_image_path);
		switch ($type) {

			case 'image/png':
				$src_image = imagecreatefrompng($src_image_path);
				break;

			case 'image/gif':
				$src_image = imagecreatefromgif($src_image_path);
				break;
			
			case 'image/jpeg':
				$src_image = imagecreatefromjpeg($src_image_path);
				break;
			
			case 'image/webp':
				$src_image = imagecreatefromwebp($src_image_path);
				break;
			
			default:
				return;
				break;
		}

		if($src_image){

			$width = imagesx($src_image);
			$height = imagesy($src_image);

			//check which side is larger
			if($width > $height)
			{
				$extra_space = $width - $height;
				$src_x = $extra_space / 2;
				$src_y = 0;

				$src_w = $height;
				$src_h = $height;
			}else
			{
				//$extra_space = $height - $width;
				//$src_y = $extra_space / 2;
				$src_y = 0;
				$src_x = 0;

				$src_w = $width;
				$src_h = $width;
			}

			$dst_image = imagecreatetruecolor($max_size, $max_size);
			if($type == 'image/png')
			{

				imagealphablending($dst_image, false);
				imagesavealpha($dst_image, true );
			}

			imagecopyresampled($dst_image, $src_image, 0, 0, $src_x, $src_y, $max_size, $max_size, $src_w, $src_h);

			imagedestroy($src_image);
			
			switch ($type) {

				case 'image/png':
					imagepng($dst_image,$src_image_path,9);
					break;

				case 'image/gif':
					imagegif($dst_image,$src_image_path);
					break;
				
				case 'image/jpeg':
					imagejpeg($dst_image,$src_image_path,50);
					break;
				
				case 'image/webp':
					imagewebp($dst_image,$src_image_path,50);
					break;
				
				default:
					imagejpeg($dst_image,$src_image_path,50);
					break;
			}
			
			imagedestroy($dst_image);
			
		}
	}
}

function resize($filename, $max_size = 700)
{

	if(!file_exists($filename))
		return $filename;

	$type = mime_content_type($filename);
	$angle = 0;

	switch ($type) 
	{
		case 'image/jpeg':
			$image = imagecreatefromjpeg($filename);
			break;
		case 'image/png':
			$image = imagecreatefrompng($filename);
			break;
		case 'image/gif':
			$image = imagecreatefromgif($filename);
			break;
		case 'image/webp':
			$image = imagecreatefromwebp($filename);
			break;
		
		default:
			return $filename;
			break;
	}

	if($type == 'image/jpeg')
	{
		$exif = @exif_read_data($filename);
		if(!empty($exif['Orientation']))
		{
			switch ($exif['Orientation']) {
				case 3:
					$angle = 180;
					break;
				case 5:
					$angle = -90;
					break;
				case 6:
					$angle = -90;
					break;
				case 7:
					$angle = -90;
					break;
				case 8:
					$angle = 90;
					break;
				
				default:
					$angle = 0;
					break;
			}
		}
	}

	$src_w = imagesx($image);
	$src_h = imagesy($image);
	
	if($src_w > $src_h)
	{
		if($src_w < $max_size)
			$max_size = $src_w;
		
		$dst_w = $max_size;
		$dst_h = ($src_h / $src_w) * $max_size;
	}else{

		if($src_h < $max_size)
			$max_size = $src_h;

		$dst_h = $max_size;
		$dst_w = ($src_w / $src_h) * $max_size;
	}

	$dst_w = round($dst_w);
	$dst_h = round($dst_h);

	$dst_image = imagecreatetruecolor($dst_w, $dst_h);
	if($type == 'image/png')
	{
		imagealphablending($dst_image, false);
		imagesavealpha($dst_image, true);
	}

	imagecopyresampled($dst_image, $image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
	imagedestroy($image);
	
	if($type == 'image/jpeg' && $angle != 0)
		$dst_image = imagerotate($dst_image, $angle, 0);

	switch ($type) 
	{
		case 'image/jpeg':
			imagejpeg($dst_image,$filename,80);
			break;
		case 'image/png':
			imagepng($dst_image,$filename);
			break;
		case 'image/gif':
			imagegif($dst_image,$filename);
			break;
		case 'image/webp':
			imagewebp($dst_image,$filename);
			break;
		
		default:
			return $filename;
			break;
	}

	imagedestroy($dst_image);
	return $filename;

}


function create_tables()
{

	$query = "create table if not exists ui_pages 

		(
			id int primary key auto_increment,
			user_id int default 0 not null,
			user_token varchar(255) null,
			filename varchar(100) not null,
			image varchar(255) not null,
			html longtext,
			html_file varchar(1024) null,
			styles longtext,
			styles_file varchar(1024) null,
			js text,
			js_file varchar(1024) null,
			meta text,
			date datetime,

			key filename (filename),
			key user_token (user_token),
			key user_id (user_id)

		)
	";

	query($query);

	$query = "create table if not exists bi_icons 

		(
			id int primary key auto_increment,
			icon varchar(30) not null,
			tags varchar(100) null,
			category varchar(100) null,

			key icon (icon),
			key tags (tags),
			key category (category)

		)
	";
	query($query);
	
	$query = "create table if not exists ui_exports

		(
			id int primary key auto_increment,
			user_id int default 0 not null,
			user_token varchar(255) null,
			filename varchar(100) not null,
			html text,
			styles text,
			js text,
			meta text,
			date datetime,

			key filename (filename),
			key user_token (user_token),
			key user_id (user_id)

		)
	";

	query($query);

	$query = "create table if not exists users

		(
			id int primary key auto_increment,
			email varchar(100) not null,
			username varchar(100) not null,
			password varchar(255) not null,
			role varchar(20) not null,
			
			date datetime,

			key username (username),
			key email (email),
			key date (date)

		)
	";

	query($query);

	$query = "create table if not exists settings 

		(
			id int primary key auto_increment,
			user_id int default 0 not null,
			user_token varchar(255) null,
			setting varchar(100) not null,
			value text null,
			disabled tinyint(1) default 0,

			key setting (setting),
			key user_token (user_token),
			key user_id (user_id),
			key disabled (disabled)

		)
	";

	query($query);


}
