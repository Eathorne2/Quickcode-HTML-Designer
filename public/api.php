<?php

session_start();

require 'functions.php';

$path = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].str_replace(basename(__FILE__), '', $_SERVER['REQUEST_URI']);
define('ROOT', $path);
define('TEMPLATES_ROOT', $path);

$user_id = $_SESSION['user_id'] ?? 0;
$username = $_SESSION['username'] ?? 'User';
$image_limit = 24;

$info = (object)[];
$info->message = '';
$info->success = false;
$info->logged_in = empty($user_id) ? false : true;
$info->username = $username;
$info->user_row = $_SESSION['user_row'] ?? [];

if(!empty($user_id))
{
	$info->username = $_SESSION['username'] ?? '';
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$info->data_type = $_POST['data_type'] ?? '';
	

	if($_POST['data_type'] == "load_images")
	{

		$folder = 'images/segment_images/';
		$folders = scandir($folder);

		unset($folders[0]);
		unset($folders[1]);
		$folders = array_values($folders);

		if($info->logged_in)
			array_unshift($folders, 'custom');

		if(!empty($_POST['folder'])){
			$folder = $folder . $_POST['folder'].'/';
		}else{
			$folder = $folder . 'assorted/';
		}

		if($folder == 'images/segment_images/custom/'){

			$folder = 'uploads/'.$user_id.'/';
			if(!file_exists($folder))
				mkdir($folder,0777,true);
			
			$images = glob($folder .'{*.jpg,*.jpeg,*.png,*.gif,*.webp,*.svg}', GLOB_BRACE);
			rsort($images);
		}else{
			$images = glob($folder .'{*.jpg,*.jpeg,*.png,*.gif,*.webp,*.svg}', GLOB_BRACE);
		}
		//remove thumbnails
		foreach ($images as $key => $img) {
			if(strstr($img, '_thumbnail'))
				unset($images[$key]);
		}


		$page_number = empty($_POST['page_number']) ? 1 : $_POST['page_number'];
		$limit = empty($_POST['limit']) ? 12 : $_POST['limit'];

		$offset = ($page_number - 1) * $limit;
		$new_images = [];

		$num = 0;
		$added = 0;
		foreach ($images as $key => $image) {
			if($num >= $offset && $added <= $limit){
				$new_images[] = [
					'path'=>str_replace(ROOT,"",$image),
					'thumbnail'=>get_thumbnail(str_replace(ROOT,"",$image)),
				];
				$added++;
			}

			$num++;
		}

		foreach ($folders as $key => $fol) {
			
			$folders[$key] = (object)[];
			$folders[$key]->label = $fol;
			$folders[$key]->name = $fol;

			if($fol == 'custom')
				$folders[$key]->image_count = floor(count(glob('uploads/'.$user_id.'/' .'{*.jpg,*.jpeg,*.png,*.gif,*.webp,*.svg}', GLOB_BRACE)) / 2);
			else
				$folders[$key]->image_count = floor(count(glob('images/segment_images/'.$fol.'/' .'{*.jpg,*.jpeg,*.png,*.gif,*.webp,*.svg}', GLOB_BRACE)) / 2);
		}

		$info->folder = $_POST['folder'] ?? 'assorted';
		$info->folders = $folders;
		$info->data = $new_images;
		$info->total = count($images);
		$info->success = true;
		
	}else
	if($_POST['data_type'] == "upload_image")
	{
		$folder = 'uploads/'.$user_id.'/';
		if(!file_exists($folder))
			mkdir($folder,0777,true);

		$images = glob($folder .'{*.jpg,*.jpeg,*.png,*.gif,*.webp,*.svg}', GLOB_BRACE);
		rsort($images);
		
		if(count($images) >= $image_limit)
			unlink(array_pop($images));

		if(!empty($_FILES['file']['name']))
		{
			$allowed = ['image/jpeg','image/png','image/webp'];
			$allowed_size = 10;
			$allowed_size = (10 * 1024 * 1024);
			if(in_array($_FILES['file']['type'], $allowed))
			{
				if($_FILES['file']['size'] < $allowed_size)
				{
					$destination = $folder . time() . '.jpg';

					move_uploaded_file($_FILES['file']['tmp_name'], $destination);
					resize($destination,2000);
					$info->success = true;
				}else{
					$info->message = 'The file size is larger than the required size';
				}

			}else{
				$info->message = 'The file size type is not supported';
			}
		}else{
			$info->message = 'The file dis not upload correctly';
		}

/*		$info->folder = $_POST['folder'] ?? 'custom';
		$info->folders = $folders;
		$info->data = $new_images;
		$info->total = count($images);*/

	}else
	if($_POST['data_type'] == "delete_image")
	{

		if(file_exists($_POST['file']))
		{

			$thumb = get_thumbnail($_POST['file']);
			if(file_exists($thumb))
			{
				unlink($thumb);
			}

			unlink($_POST['file']);
			$info->success = true;

		}else{
			$info->message = "That file was not found";
		}

	}else
	if($_POST['data_type'] == "load_palettes")
	{

		$folder = 'color_palettes/';
		$palette_files = glob($folder .'{*.palette}', GLOB_BRACE);

		$palettes = [];

		//also load user palettes from database
		$setting = 'color_palette';
		$query = "select * from settings where setting = '$setting' && user_id = '$user_id' order by id desc";
		$rows = query($query);

		if($rows)
		{
			foreach ($rows as $row) {

				$obj = json_decode($row->value);
				if($obj)
				{
					$data = [
						'id'=>$row->id,
						'colors'=>$obj->colors,
						'name'=>$obj->name,
						'type'=>$obj->type,
					];

					$palettes[] = $data;
				}
			}
		}

		foreach ($palette_files as $file) {
			$obj = [
				'colors'=>file_get_contents($file),
				'name'=>str_replace(".palette", "", basename($file)),
				'type'=>'system',
			];
			$palettes[] = $obj;
		}

		$info->data = $palettes;
		$info->success = true;
		
	}else
	if($_POST['data_type'] == "save_palette")
	{
 
 	if(!empty($user_id))
 	{

		$obj = (object)[
			'name'=>$_POST['name'],
			'colors'=>$_POST['colors'],
			'type'=>$_POST['type'],
		];

		$setting = 'color_palette';
		$value = addslashes(json_encode($obj));

		$query = "insert into settings (user_id,setting,value,disabled) values ('$user_id','$setting','$value',0)";
		query($query);
 	}

		$info->success = true;
		
	}else
	if($_POST['data_type'] == "delete_palette")
	{
 
 	if(!empty($user_id))
 	{
 
		$setting = 'color_palette';
		$id = (int)($_POST['id']);

		$query = "delete from settings where id = '$id' && user_id = '$user_id' limit 1";
		query($query);
 	}

		$info->success = true;
		
	}else
	if($_POST['data_type'] == "load_item")
	{
		$item = $_POST['item'];

		$folder = '01.elements/';
		if(!empty($_POST['folder'])){
			$folder = $_POST['folder'].'/';
		}

		$data =  file_get_contents("segments/".$folder . $item .".php");

		$info->data = $data;
		$info->success = true;
		
	}else
	if($_POST['data_type'] == "check_login")
	{

		$info->success = true;
		
	}else
	if($_POST['data_type'] == "logout")
	{
		$_SESSION['user_id'] = 0;
		$_SESSION['username'] = 'User';
		$_SESSION['user_row'] = [];

		$info->message = "You were succesfully logged out";
		$info->success = true;
		
	}else
	if($_POST['data_type'] == "signup")
	{
		$email = $_POST['email'] ?? '';
		$row = query("select * from users where email = :email limit 1",['email'=>$email]);
		if($row)
		{
			$info->message = "Another user already has this email address";
		}else{

			$info->success = true;
			$email = addslashes($_POST['email'] ?? '');
			$username = addslashes($_POST['username'] ?? '');
			$password = addslashes($_POST['password'] ?? '');

			$date = date("Y-m-d H:i:s");
			$password = password_hash($password, PASSWORD_DEFAULT);
			
			query("insert into users (email,username,password,date) values ('$email','$username','$password','$date')",['email'=>$email]);
			$info->message = "You were succesfully signed up";
		}

	}else
	if($_POST['data_type'] == "save_profile")
	{
		$info->saved = false;
		$email = $_POST['email'] ?? '';
		$id = $_POST['id'] ?? '0';
		$row = query("select * from users where email = :email && id != :id limit 1",['email'=>$email,'id'=>$id]);
		if($row)
		{
			$info->message = "Another user already has this email address";
		}else{

			$info->success = true;
			$info->saved = true;
			$email = addslashes($_POST['email'] ?? '');
			$username = addslashes($_POST['username'] ?? '');
			$password = addslashes($_POST['password'] ?? '');

			if(!empty($password)){
				$password = password_hash($password, PASSWORD_DEFAULT);
				query("insert into users (email,username,password) values ('$email','$username','$password')");
			}else{
				query("insert into users (email,username) values ('$email','$username')");
			}
			
			$info->message = "You info was succesfully saved";
		}

	}else
	if($_POST['data_type'] == "login")
	{
		$email = $_POST['email'] ?? 0;
		$password = $_POST['password'] ?? 0;

		$row = query("select * from users where email = :email limit 1",['email'=>$email]);
		if($row)
		{
			if(password_verify($password, $row[0]->password))
			{
				$_SESSION['user_id'] = $row[0]->id;
				$_SESSION['username'] = $row[0]->username;
				$_SESSION['user_row'] = $row[0];

				$info->logged_in = true;
				$info->success = true;
				$info->message = "Successfully logged in";
				$info->username = $row[0]->username;
				$info->user_row = $row[0];

			}else{
				$info->message = "Wrong email or password";
			}
		}else{
			$info->message = "Wrong email or password";
		}
		
	}else
	if($_POST['data_type'] == "delete")
	{
		$id = $_POST['id'] ?? 0;
		$row = query("select * from ui_pages where id = :id && user_id = :user_id limit 1",['id'=>$id,'user_id'=>$user_id]);

		if($row)
		{
			query("delete from ui_pages where id = :id && user_id = :user_id limit 1",['id'=>$id,'user_id'=>$user_id]);
			if(file_exists($row[0]->image))
				unlink($row[0]->image);

			if(file_exists($row[0]->html_file))
				unlink($row[0]->html_file);

			if(file_exists($row[0]->js_file))
				unlink($row[0]->js_file);

			if(file_exists($row[0]->styles_file))
				unlink($row[0]->styles_file);
			
			$info->message = "Record deleted succesfully";
		}else{
			$info->message = "That record was not found";
		}

		$info->success = true;
		
	}else
	if($_POST['data_type'] == "load_items")
	{

		$folder = 'segments/';
		$folders = scandir($folder);

		unset($folders[0]);
		unset($folders[1]);
		foreach ($folders as $key => $f) {
			
			if(!is_dir($folder.$f.'/'))
				unset($folders[$key]);
		}
		
		$folders = array_values($folders);

		if(!empty($_POST['folder'])){
			$folder = $folder . $_POST['folder'].'/';
		}else{
			$folder = $folder . '01.elements/';
		}

		$folder = str_replace("..", "", $folder);
		//$items = glob($folder .'{*.php,*.PHP}', GLOB_BRACE);

		if(!empty($_POST['text']) && strstr($folder, 'search/')){
			$items = [];
			$text = $_POST['text'] ?? '';
			foreach ($folders as $f) {
				if(is_dir('segments/'.$f.'/')){
					$a = glob('segments/'.$f.'/' .'{*.php,*.PHP}', GLOB_BRACE);
					foreach ($a as $afile) {
						if(strstr($afile, $text))
							$items[] = $afile;
					}
				}
			}
		}else{
			$items = glob($folder .'{*.php,*.PHP}', GLOB_BRACE);
		}

		foreach ($items as $key => $item) {

			$obj = (object)[];
			$obj->name = preg_replace("/(\_|\.php)/"," ",basename($item));
			$obj->filename = preg_replace("/\.php/","",basename($item));
			$obj->folder = str_replace('segments/', '', $item);
			$obj->folder = str_replace(basename($item), '', $obj->folder);
			$obj->folder = str_replace('/', '', $obj->folder);

			$image = str_replace(".php", ".jpg", $item);
			$obj->image = file_exists($image) ? $image : "img/comp.png";

			$items[$key] = $obj;
		}

		$page_number = empty($_POST['page_number']) ? 1 : $_POST['page_number'];
		$limit = empty($_POST['limit']) ? 12 : $_POST['limit'];

		$offset = ($page_number - 1) * $limit;
		$new_items = [];

		$num = 0;
		$added = 0;
		foreach ($items as $key => $item) {
			if($num >= $offset && $added <= $limit){
				$new_items[] = $item;
				$added++;
			}

			$num++;
		}


		foreach ($folders as $key => $fol) {
			
			$folders[$key] = (object)[];
			$folders[$key]->label = str_replace('_', ' ', $fol);
			$folders[$key]->name = $fol;

			$folders[$key]->item_count = count(glob('segments/'.$fol.'/' .'{*.php}', GLOB_BRACE));
		}


		$info->data = $new_items;
		$info->total = count($items);

		$info->folder = $_POST['folder'] ?? '01.elements';
		$info->folders = $folders;
		$info->success = true;
		
	}else
	if($_POST['data_type'] == "load_icons")
	{
		$search = $_POST['search'] ?? '';
		if(!empty($search)){
			$info->search = $search;
			$search = "%".$search."%";
			$rows = query("select icon from bi_icons where icon like :search || tags like :search || category like :search limit 100",['search'=>$search]);
		}else{
			$rows = query("select icon from bi_icons order by rand() limit 200");
		}

		if($rows)
		{
			$info->data = $rows;
		}
		$info->success = true;

	}else
	if($_POST['data_type'] == "open")
	{
		$id = $_POST['id'] ?? 0;
		$import_mode = $_POST['import_mode'] ?? false;
		if(!empty($user_id))
		{

			if($row = query("select * from ui_pages where user_id = :user_id && id = :id limit 1",['id'=>$id,'user_id'=>$user_id]))
			{

				if(empty($row[0]->html_file))
					$info->html = $row[0]->html;
				else
					$info->html = file_get_contents($row[0]->html_file);

				if(empty($row[0]->styles_file))
					$info->styles = $row[0]->styles;
				else
					$info->styles = file_get_contents($row[0]->styles_file);

				$info->filename = $row[0]->filename;
				$info->meta = $row[0]->meta;
				$info->id = $row[0]->id;
				$info->date = date("jS M, y",strtotime($row[0]->date));
				$info->success = true;

				//for import mode
				if($import_mode)
				{

					$plain_html = json_decode($info->html);
					$plain_html = $plain_html[0]->html;

					$plain_styles = json_decode($info->styles);

					$css = '';
					foreach ($plain_styles as $mode => $obj) {

						$obj->main_css = preg_replace("/<div[a-zA-Z0-9\=\"\\\>\-\_\\t\\n ]+<style>\./", '.', $obj->main_css);
						$obj->main_css = preg_replace("/<\/style>[a-zA-Z0-9\=\"\\\>\-\_\\t\\n ]*<\/div>/", '', $obj->main_css);
						//$obj->main_css = preg_replace("/\.[a-zA-Z0-9\-\_\:\~]+\{\}/", '', $obj->main_css);

						$obj->sudo_css = preg_replace("/<div[a-zA-Z0-9\=\"\\\>\-\_\:\\t\\n\~\. ]+<style>\./", '.', $obj->sudo_css);
						$obj->sudo_css = preg_replace("/<\/style>[a-zA-Z0-9\=\"\\\>\-\_\\t\\n\~\. ]*<\/div>/", '', $obj->sudo_css);
						//$obj->sudo_css = preg_replace("/\.[a-zA-Z0-9\-\_\:\~]+\{\}/", '', $obj->sudo_css);
						
						if(!empty($obj->combo_css))
						{

							$obj->combo_css = preg_replace("/<div[a-zA-Z0-9\=\"\\\>\-\_\~\:\\t\\n\~\. ]+<style>\./", '.', $obj->combo_css);
							$obj->combo_css = preg_replace("/<\/style>[a-zA-Z0-9\=\"\\\>\-\_\\t\\n\~\. ]*<\/div>/", '', $obj->combo_css);
							//$obj->combo_css = preg_replace("/\.[a-zA-Z0-9\-\_\:\~]+\{\}/", '', $obj->combo_css);
							
						}
						$css .= '<style id="'.$mode.'">'."\n\r" . $obj->main_css ."\n\r". $obj->sudo_css ."\n\r". ($obj->combo_css ?? '') ."\n\r". '</style>'."\n\r";
						
					}

					$info->data = str_replace("--muted--", '', $css) . $plain_html;
					$info->data = preg_replace("/item_[0-9]+/", '', $info->data);
					file_put_contents('mycss.txt', $info->data);

					$open_time = time();
					$query = "update ui_pages set open_time = '$open_time' where id = '$id' && user_id = '$user_id' limit 1";
					query($query);
				}
			
			}else{
				$info->message = "File not found";
			}

		}else{
			$info->message = "Please login first!";
		}

	}else
	if($_POST['data_type'] == "load_template")
	{

		$slug = $_POST['slug'] ?? 0;

		//get template
		$ch = curl_init();
		$curlConfig = array(
		    CURLOPT_URL            => TEMPLATES_ROOT."template-data/".$slug,
		    CURLOPT_POST           => true,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POSTFIELDS     => array(
		        'field1' => 'some date',
		        'field2' => 'some other data',
		    )
		);
		curl_setopt_array($ch, $curlConfig);
		$data = curl_exec($ch);
		curl_close($ch);

		if(!empty($data))
		{

			$row = json_decode($data);
			$info->data_type = 'open';
			if($row)
			{

				$info->html = $row->html;
				$info->styles = $row->styles;
				$info->filename = $row->template;
				$info->meta = $row->meta;
				$info->id = $row->id;
				$info->js = $row->js ?? '';
				$info->date = date("jS M, y",strtotime($row->date));
				$info->success = true;
			}
		}

	}else
	if($_POST['data_type'] == "open_dialog")
	{

		if($rows = query("select * from ui_pages where user_id = :user_id order by open_time desc limit 100",['user_id'=>$user_id]))
		{
			foreach ($rows as $key => $value) {
				$rows[$key]->date = date("jS M, y",strtotime($value->date));
				$rows[$key]->image = file_exists($value->image ?? '') ? $value->image.'?'.rand(0,9999) : 'img/no_image.jpg?v1';
			}
			$info->data = $rows;
		}
		$info->success = true;

	}else
	if($_POST['data_type'] == "save")
	{

		if(!empty($user_id))
		{

			$id 				= $_POST['id'] ?? 0;
			$_POST['date'] = date("Y-m-d h:i:s");
			$_POST['open_time'] = time();
			$_POST['user_id'] = $user_id;
			$_POST['user_token'] = $user_token ?? '';
			unset($_POST['data_type']);
			
			//save preview image
			$folder = "thumbnails/";
			if(!file_exists($folder)){
				mkdir($folder,0777,true);
				file_put_contents($folder.'index.php', "<?php //silence");
			}

			$save_folder = 'saved/'.$user_id.'/';
			if(!file_exists($save_folder)){
				mkdir($save_folder,0777,true);
				file_put_contents($save_folder.'index.php', "<?php //silence");
			}

			$image = str_replace(" ","_",$folder . time() . strtolower($_POST['filename']) . ".jpg");
			$parts = explode(",",$_POST['image']);

			if(!empty($parts[1])){
				file_put_contents($image, base64_decode($parts[1]));

				crop_image($image);
			}

			$_POST['image'] = $image;
			extract($_POST);

			$html = ($html);
			$html_file = $save_folder.'html_file_'.time().'_'.rand(0,99).'.txt';
			$styles = ($styles);
			$styles_file = $save_folder.'styles_file_'.time().'_'.rand(0,99).'.txt';
			$js_file = $save_folder.'js_file_'.time().'_'.rand(0,99).'.txt';

			if($id)
			{
				
				$query = "update ui_pages set image = '$image', filename = '$filename', html_file = '$html_file', styles_file = '$styles_file', js_file = '$js_file', meta = '$meta', open_time = '$open_time' where id = '$id' limit 1";
				query($query);
				$info->id = $id;

			}else
			{
				unset($_POST['id']);
				$query = "insert into ui_pages (image, user_id, user_token, filename, meta, date, open_time, html_file, styles_file, js_file) values ('$image', '$user_id', '$user_token', '$filename', '$meta', '$date', '$open_time', '$html_file', '$styles_file', '$js_file')";
				query($query);

				$query = "select id from ui_pages where user_id = :user_id order by id desc limit 1";
				$row = query($query,['user_id'=>$user_id]);

				$info->id = 0;
				if(is_array($row))
					$info->id = $row[0]->id;
			}
			
			file_put_contents($html_file, $html);
			file_put_contents($js_file, $js);
			file_put_contents($styles_file, $styles);

			$info->success = true;
		}else{
			$info->message = "Please login first to save your projects";
		}

	}else
	if($_POST['data_type'] == "export" || $_POST['data_type'] == "export_template" || $_POST['data_type'] == "preview")
	{
		
		$info->success = true;
/*
		if($_POST['is_start_part'])
		{
			$_SESSION['html_parts'] = [];
		}

		$_SESSION['html_parts'][] = $_POST['html'];

		if(!$_POST['is_end_part'])
		{
			echo json_encode($info);
			die;
		}
		
		$_POST['html'] = implode('', $_SESSION['html_parts']);
*/
		//save to export table
		if(false && $_POST['data_type'] == "export")
		{
			$arr = [];
			$user_id 		= addslashes($user_id);
			$user_token 	= addslashes($user_token);
			$filename 		= addslashes($_POST['filename']);
			$html 				= addslashes($_POST['html']);
			$js 					= addslashes($_POST['js'] ?? "");
			$styles 			= addslashes($_POST['styles']);
			$scripts 			= addslashes($_POST['scripts']);
			$styles_mobile 			= addslashes($_POST['styles_mobile']);
			$styles_mobile_landscape 			= addslashes($_POST['styles_mobile_landscape']);
			$styles_tablet 			= addslashes($_POST['styles_tablet']);
			$styles_laptop 			= addslashes($_POST['styles_laptop']);
			$styles_monitor 			= addslashes($_POST['styles_monitor']);
			$meta 				= addslashes($_POST['meta'] ?? "");
			$date 				= addslashes(date("Y-m-d h:i:s"));

			$query = "insert into ui_exports (user_id, user_token, filename, html, js, styles, meta, date, styles_mobile, styles_mobile_landscape, styles_tablet, styles_laptop, styles_monitor) values ('$user_id', '$user_token', '$filename', '$html', '$js', '$styles', '$meta', '$date', '$styles_mobile', '$styles_mobile_landscape', '$styles_tablet', '$styles_laptop', '$styles_monitor')";
			query($query);
			
		}

		//create export folder
		$folder = 'exports/'.hash('md5', session_id()).'/';
		if(!file_exists($folder)){
			mkdir($folder, 0777, true);
		}else{
			//delete files
			$myfiles = glob($folder."*.*");
			
			foreach ($myfiles as $myfile) {
				if(!is_dir($myfile))
				unlink($myfile);
			}
		}

		$styles_folder = $folder . 'assets/css/';
		$scripts_folder = $folder . 'assets/js/';
		$bootstrap_fonts_folder = $styles_folder . 'fonts/';
		$fonts_folder = $folder . 'assets/fonts/';
		$images_folder = $folder . 'assets/images/';

		if($_POST['data_type'] == "export_template")
		{
			//save raw data files
			file_put_contents($folder.'raw_html.txt', $_POST['html']);
			file_put_contents($folder.'raw_styles.txt', $_POST['template_styles']);
			file_put_contents($folder.'raw_js.txt', $_POST['scripts']);
			file_put_contents($folder.'meta.txt', $_POST['meta']);

			//save preview image
			if(!empty($_POST['preview_image']))
			{
				$filename = $folder . 'preview.jpg';
				if(strstr($_POST['preview_image'], ';base64,'))
				{
					$parts = explode(';base64,', $_POST['preview_image']);
					file_put_contents($filename, base64_decode($parts[1] ?? ''));
				}
			}

		}

		//separate the html pages
		$html_pages = json_decode($_POST['html'],true);

		foreach ($html_pages as $key => $myobj) {
			
			//remove all content editable from html
			$html_pages[$key]['html'] = preg_replace("/contenteditable=\"(true|false)*\"/", "", $html_pages[$key]['html']);
			$html_pages[$key]['html'] = preg_replace("/editable=\"(true|false)*\"/", "", $html_pages[$key]['html']);
			$html_pages[$key]['html'] = str_replace(' onsubmit="return false"', "", $html_pages[$key]['html']);
			$html_pages[$key]['html'] = str_replace(' onclick="return false"', "", $html_pages[$key]['html']);
			$html_pages[$key]['html'] = str_replace(' ondragstart="return false"', "", $html_pages[$key]['html']);
			$html_pages[$key]['html'] = str_replace('pointer-events: none;', "", $html_pages[$key]['html']);

			//remove ids
			$html_pages[$key]['html'] = preg_replace("/id=\"item_[0-9]+\"/", "", $html_pages[$key]['html']);
		}

 		/** create sub folders **/
		if(!file_exists($styles_folder)){
			mkdir($styles_folder, 0777, true);
		}else{
			//delete files
			$myfiles = glob($styles_folder."*.*");
			
			foreach ($myfiles as $myfile) {
				if(!is_dir($myfile))
				unlink($myfile);
			}
		}

		if(!file_exists($scripts_folder)){
			mkdir($scripts_folder, 0777, true);
		}else{
			//delete files
			$myfiles = glob($scripts_folder."*.*");
			
			foreach ($myfiles as $myfile) {
				if(!is_dir($myfile))
				unlink($myfile);
			}
		}
		
		if(!file_exists($fonts_folder)){
			mkdir($fonts_folder, 0777, true);
		}else{
			//delete files
			$myfiles = glob($fonts_folder."*.*");
			
			foreach ($myfiles as $myfile) {
				if(!is_dir($myfile))
				unlink($myfile);
			}
		}

		if(!file_exists($images_folder)){
			mkdir($images_folder, 0777, true);
		}else{
			//delete files
			$myfiles = glob($images_folder."*.*");
			
			foreach ($myfiles as $myfile) {
				if(!is_dir($myfile))
				unlink($myfile);
			}
		}
		
		if(!file_exists($bootstrap_fonts_folder)){
			mkdir($bootstrap_fonts_folder, 0777, true);
		}else{
			//delete files
			$myfiles = glob($bootstrap_fonts_folder."*.*");
			
			foreach ($myfiles as $myfile) {
				if(!is_dir($myfile))
				unlink($myfile);
			}
		}
		
		/**template files**/
		$html_header = 'export_templates/header.html';
		$readme_file = 'export_templates/readme.txt';
		$html_footer = 'export_templates/footer.html';
		$animator_script = 'export_templates/element-animator.js';
		$tabs_script = 'export_templates/tab-activator.js';
		$dropdowns_script = 'export_templates/dropdown-activator.js';
		$charts_script = 'export_templates/chart-loader.js';
		$chartjs_script = 'export_templates/chart.min.js';
		$sliders_script = 'export_templates/slider-activator.js';
		$card_sliders_script = 'export_templates/card-slider.js';

		/**files to export**/
		$html_file = $folder . 'index.html';
		$styles_file =  'styles.css';

		//move icons files
		copy('assets/css/bootstrap-icons.min.css', $styles_folder . 'bootstrap-icons.css');
		copy('assets/css/fonts/bootstrap-icons.woff', $bootstrap_fonts_folder . 'bootstrap-icons.woff');
		copy('assets/css/fonts/bootstrap-icons.woff2', $bootstrap_fonts_folder . 'bootstrap-icons.woff2');

		//copy font files
		copy('assets/fonts/OpenSans-Regular.ttf', $fonts_folder . 'OpenSans-Regular.ttf');

		$fonts = [
			'opensans' => 'OpenSans-Regular.ttf',
			'dancingscript' => 'DancingScript-VariableFont_wght.ttf',
			'amatic' => 'AmaticSC-Regular.ttf',
			'specialelite' => 'SpecialElite-Regular.ttf',
			'yellowtail' => 'Yellowtail-Regular.ttf',
			'segoe' => 'Segoe-UI.ttf',
			'segoebold' => 'Segoe-UI-Bold.ttf',
			'poppins' => 'Poppins-Regular.ttf',
			'fira' => 'FiraSans-Regular.ttf',
			'bonfire' => 'bonfire.ttf',
			'adorable-handmade' => 'adorable-handmade.ttf',
			'bonfire' => 'bonfire.ttf',
			'info-story' => 'info-story.ttf',
			'montserrat' => 'Montserrat-VariableFont_wght.ttf',
			'shantell' => 'ShantellSans-VariableFont-wght.ttf',
			'shadows-into-light' => 'ShadowsIntoLight-Regular.ttf',
			'mynerve' => 'Mynerve-Regular.ttf',
			'bodoni' => 'BOD.TTF',
		];

		$required_styles = 
		preg_replace("/\t{2}/", "", "
		*, ::after, ::before {
		  box-sizing: border-box;
		}

		@font-face{
			src: url(../fonts/OpenSans-Regular.ttf);
			font-family: opensans;
		}

		body{

			font-family: opensans;
			font-size: 16px;
			margin:0px;
			padding:0px;
			word-break: break-word;
			word-wrap: break-word;
			overflow-x: hidden;
			width:100%;
		}
		");

	foreach ($html_pages as $key => $myobj) {
		//copy all images from html
		$images = preg_match_all("/src=\"(images|img)\/[^\"]+/", $html_pages[$key]['html'], $matches);
		foreach ($matches[0] as $path)
		{
			
			$path = str_replace('src="', "", $path);
			if(file_exists($path))
			{
				copy($path, $images_folder . basename($path));
				$html_pages[$key]['html'] = str_replace($path, $images_folder . basename($path), $html_pages[$key]['html']);
			}
		}
	}


		/**save css file**/
		$styles_data = "";
		$media_queries = [
			'mobile'=> "\n@media all and (max-width: 350px){\n",
			'mobile_landscape'=> "\n@media all and (max-width: 576px){\n",
			'tablet'=> "\n@media all and (max-width: 768px){\n",
			'laptop'=> "\n@media all and (max-width: 992px){\n",
		];

		$styles_obj = json_decode($_POST['styles'],true);
		$sudo_styles_obj = json_decode($_POST['sudo_styles'],true);
		$combo_styles_obj = json_decode($_POST['combo_styles'],true);
		$animations_obj = json_decode($_POST['animations'],true);

		/** add any animations first**/
		foreach ($animations_obj as $key => $anim) {
			$styles_data .= $anim;
		}

		/** monitor styles **/
		if(!empty($styles_obj['monitor']))
		{
			foreach ($styles_obj['monitor'] as $css) {
				$css = preg_replace("/<style>|<\/style>/", '', $css);
				$styles_data .= $css;
			}
		}

		if(!empty($sudo_styles_obj['monitor']))
		{
			foreach ($sudo_styles_obj['monitor'] as $css) {
				$css = preg_replace("/<style>|<\/style>/", '', $css);
				$styles_data .= $css;
			}
		}

		if(!empty($combo_styles_obj['monitor']))
		{
			foreach ($combo_styles_obj['monitor'] as $css) {
				$css = preg_replace("/<style>|<\/style>/", '', $css);
				$styles_data .= $css;
			}
		}

		/**************************/
		/** laptop styles **/
		if(!empty($styles_obj['laptop']))
		{
			$temp_css = '';
			foreach ($styles_obj['laptop'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['laptop'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}

		if(!empty($sudo_styles_obj['laptop']))
		{
			$temp_css = '';
			foreach ($sudo_styles_obj['laptop'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['laptop'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}

		if(!empty($combo_styles_obj['laptop']))
		{
			$temp_css = '';
			foreach ($combo_styles_obj['laptop'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['laptop'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}
		
		/**************************/
		/** tablet styles **/
		if(!empty($styles_obj['tablet']))
		{
			$temp_css = '';
			foreach ($styles_obj['tablet'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['tablet'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}

		if(!empty($sudo_styles_obj['tablet']))
		{
			$temp_css = '';
			foreach ($sudo_styles_obj['tablet'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['tablet'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}

		if(!empty($combo_styles_obj['tablet']))
		{
			$temp_css = '';
			foreach ($combo_styles_obj['tablet'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['tablet'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}
		
		/**************************/
		/** mobile_landscape styles **/
		if(!empty($styles_obj['mobile_landscape']))
		{
			$temp_css = '';
			foreach ($styles_obj['mobile_landscape'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['mobile_landscape'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}

		if(!empty($sudo_styles_obj['mobile_landscape']))
		{
			$temp_css = '';
			foreach ($sudo_styles_obj['mobile_landscape'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['mobile_landscape'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}

		if(!empty($combo_styles_obj['mobile_landscape']))
		{
			$temp_css = '';
			foreach ($combo_styles_obj['mobile_landscape'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['mobile_landscape'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}
		
		/**************************/
		/** mobile styles **/
		if(!empty($styles_obj['mobile']))
		{
			$temp_css = '';
			foreach ($styles_obj['mobile'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['mobile'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}

		if(!empty($sudo_styles_obj['mobile']))
		{
			$temp_css = '';
			foreach ($sudo_styles_obj['mobile'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['mobile'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}

		if(!empty($combo_styles_obj['mobile']))
		{
			$temp_css = '';
			foreach ($combo_styles_obj['mobile'] as $css) {
				preg_match("/\{[^\}]+/", $css, $match);
				if(!empty($match))
					$temp_css .= preg_replace("/<style>|<\/style>/", '', $css);
			}

			if(!empty($temp_css)){
				$styles_data .= $media_queries['mobile'];

				$styles_data .= $temp_css;
				$styles_data .= "\n\t}";
			}
		}
		
		/**************************/

		//clean styles from the style tag
		$styles_data = preg_replace("/\t+/","\t",$styles_data);
		$styles_data = preg_replace("/\t\}/","}",$styles_data);
		$styles_data = preg_replace("/\t\./",".",$styles_data);
		$styles_data = str_replace("&quot;\n", '"', $styles_data);

		//beutify styles
		$styles_data = preg_replace("/\}/","\n}",$styles_data);
		$styles_data = preg_replace("/;/",";\n\t\t",$styles_data);
		$styles_data = preg_replace("/\{/","{\n\n\t\t",$styles_data);
		$styles_data = preg_replace("/\}\./","\n}\n\t.",$styles_data);
		$styles_data = preg_replace("/\t\s/","\t",$styles_data);
		$styles_data = preg_replace("/\n@/","\n\n@",$styles_data);
		$styles_data = preg_replace("/\t@/","\n@",$styles_data);
		$styles_data = preg_replace("/\t\./",".",$styles_data);
		$styles_data = preg_replace("/\t\s/","\t",$styles_data);
		$styles_data = preg_replace("/\t\}/","}",$styles_data);
		$styles_data = preg_replace("/\t\./",".",$styles_data);

		//remove mutes from styles
		$styles_data = preg_replace("/--muted--/","",$styles_data);

		//copy all images from html css
		$images = preg_match_all("/url\(\"\s*images\/[^\"]+/", $styles_data, $matches);
		foreach ($matches[0] as $path)
		{
			
			$path = str_replace('url("', "", $path);
			$path = trim($path);

			if(file_exists($path))
			{
				copy($path, $images_folder . basename($path));
				$styles_data = str_replace($path, '../images/'.basename($path), $styles_data);
			}
		}

		//copy all images from html css (diffrent url format)
		$images = preg_match_all("/url\(\s*images\/[^\)]+/", $styles_data, $matches);
		foreach ($matches[0] as $path)
		{
			
			$path = str_replace('url(', "", $path);
			$path = trim($path);

			if(file_exists($path))
			{
				copy($path, $images_folder . basename($path));
				$styles_data = str_replace($path, '../images/'.basename($path), $styles_data);
			}
		}

		//check for used fonts
		foreach ($fonts as $font_name => $font_filename) {
			if(preg_match("/{$font_name}/", $styles_data)){
				$required_styles .=  preg_replace("/\t{4}/", "", "
				@font-face{
					src: url(../fonts/$font_filename);
					font-family: $font_name;
				}
				");
				copy("assets/fonts/{$font_filename}", $fonts_folder . $font_filename);
			}
		}

		file_put_contents($styles_folder.$styles_file, $required_styles . $styles_data);

		//beautify and save the html

		foreach ($html_pages as $key => $myobj) {

			$html_file = $folder . $myobj['name'];
/*			if($key == 0)
				$html_file = $folder . 'index.html';
*/
			//make all lines one level
			$html_pages[$key]['html'] = preg_replace("/(\t+|\n+|\r+)/", "", $html_pages[$key]['html']);
			$html_pages[$key]['html'] = preg_replace("/>/", ">\n", $html_pages[$key]['html']);
			$html_pages[$key]['html'] = preg_replace("/</", "\n<", $html_pages[$key]['html']);
			$html_pages[$key]['html'] = preg_replace("/\n+/", "\n", $html_pages[$key]['html']);

			//add levels to lines
			$content_arr = explode("\n", $html_pages[$key]['html']);
			$new_content = "";
			$level = 1;
			$omit = ['<img','<br','<hr','<input'];
			foreach ($content_arr as $key2 => $value)
			{
				if(preg_match("/^<\/[a-zA-Z]+/", $value)){
					$level--;
				}
				$new_content .= str_repeat("\t", $level) . trim($value)."\n";
				if(preg_match("/^<[a-zA-Z]+/", $value, $match)){
					
					if(!in_array($match[0], $omit))
						$level++;
				}

			}

			$html_pages[$key]['html'] = $new_content;
			$header_content = file_get_contents($html_header);
			$header_content = str_replace('[DESCRIPTION]', $html_pages[$key]['description'] ?? '', $header_content);
			$header_content = str_replace('[KEYWORDS]', $html_pages[$key]['keywords'] ?? '', $header_content);

			$mydata = str_replace("Page Title",$html_pages[$key]['title'] == 'null' ? 'Untitled':$html_pages[$key]['title'],str_replace("styles.css","styles.css?".rand(0,9999), $header_content));
			$mydata .= str_replace($folder, "", $html_pages[$key]['html']);

			$footer_data = str_replace("script.js", "script.js?".rand(0,9999), file_get_contents($html_footer));
			
			//add animation script if any animations are present
			foreach ($animations_obj as $key => $value) {
				if(strstr($mydata, 'animation-name="'.$key)){
					$footer_data = str_replace('[SCRIPTS]', '<script src="assets/js/element-animator.js"></script>'."\n\r".'[SCRIPTS]', $footer_data);
					
					if(!file_exists($scripts_folder.'element-animator.js'))
						copy($animator_script, $scripts_folder.'element-animator.js');
					break;
				}
			}

			//add tabs script if any tabs
			if(preg_match("/role=\"tab\"/", $mydata))
			{

				$footer_data = str_replace('[SCRIPTS]', '<script src="assets/js/tab-activator.js"></script>'."\n\r".'[SCRIPTS]', $footer_data);
				if(!file_exists($scripts_folder.'tab-activator.js'))
					copy($tabs_script, $scripts_folder.'tab-activator.js');
			}

			//add dropdown script if needed
			if(preg_match("/role=\"dropdown\"/", $mydata))
			{

				$footer_data = str_replace('[SCRIPTS]', '<script src="assets/js/dropdown-activator.js"></script>'."\n\r".'[SCRIPTS]', $footer_data);
				if(!file_exists($scripts_folder.'dropdown-activator.js'))
					copy($dropdowns_script, $scripts_folder.'dropdown-activator.js');
			}

			//add slider script if needed
			if(preg_match("/role=\"slider\"/", $mydata))
			{

				$footer_data = str_replace('[SCRIPTS]', '<script src="assets/js/slider-activator.js"></script>'."\n\r".'[SCRIPTS]', $footer_data);
				if(!file_exists($scripts_folder.'slider-activator.js'))
					copy($sliders_script, $scripts_folder.'slider-activator.js');
			}

			//add card slider script if needed
			if(preg_match("/role=\"card-slider\"/", $mydata))
			{

				$footer_data = str_replace('[SCRIPTS]', '<script src="assets/js/card-slider.js"></script>'."\n\r".'[SCRIPTS]', $footer_data);
				if(!file_exists($scripts_folder.'card-slider.js'))
					copy($card_sliders_script, $scripts_folder.'card-slider.js');
			}

			

			//add chart script if needed
			if(preg_match("/role=\"chart\"/", $mydata))
			{

				$footer_data = str_replace('[SCRIPTS]', '<script src="assets/js/chart.min.js"></script>'."\n\r".'[SCRIPTS]', $footer_data);
				$footer_data = str_replace('[SCRIPTS]', '<script src="assets/js/chart-loader.js"></script>'."\n\r".'[SCRIPTS]', $footer_data);
				if(!file_exists($scripts_folder.'chart-loader.js'))
					copy($charts_script, $scripts_folder.'chart-loader.js');

				if(!file_exists($scripts_folder.'chart.min.js'))
					copy($chartjs_script, $scripts_folder.'chart.min.js');
				
			}

			

			$footer_data = str_replace('[SCRIPTS]', '', $footer_data);
			$mydata .= $footer_data;
			
			//clean textareas in  html
			$mydata = preg_replace("/\s+<\/textarea>/", '</textarea>', $mydata);
			file_put_contents($html_file, $mydata);
			
		}

		/**copy scripts**/
		$scripts_obj = json_decode($_POST['scripts'],true);
		$scripts_str = "";
		foreach ($scripts_obj as $scr_text) {
			$scripts_str .= $scr_text;
		}

		$script_file = $scripts_folder.'script.js';
		file_put_contents($script_file, $scripts_str);
		
		//copy readme file
		copy($readme_file, $folder . 'readme.txt');
		
		/**folder name to return**/
		$info->data = $folder;
		
		/**zip the files**/
		if($_POST['data_type'] == "export" || $_POST['data_type'] == "export_template")
		{

			/** zip folder **/
			// Enter the name of directory
			$pathdir = $folder;

			// Enter the name to creating zipped directory
			$zipfile = $_POST['filename'] == 'null' ? 'Untitled':$_POST['filename'];
			$zipfile = $folder . str_replace(" ","_",$zipfile)."_HTML_template.zip";

			//Create new zip class
			$zip = new ZipArchive;

			if(file_exists($zipfile))
			{
				unlink($zipfile);
			}

			//delete all zip files from folder
			$all_zips = glob($folder . "*.zip");
			foreach ($all_zips as $afile)
			{
				if(is_file($afile))
				{
					unlink($afile);
				}
			}

			if($zip->open($zipfile, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
				
				//Store the path into the variable
				$dir = opendir($pathdir);
				
				while($file = readdir($dir))
				{
						if(is_file($pathdir.$file))
						{
							$zip->addFile($pathdir.$file, $file);
						}
				}
				
				$subfolder = "assets/css/";
				$pathdir = $folder.$subfolder;
				$dir = opendir($pathdir);
				$zip->addEmptyDir($subfolder);
				while($file = readdir($dir))
				{
						if(is_file($pathdir.$file))
						{
							$zip->addFile($pathdir.$file, $subfolder.$file);
						}
				}

				$subfolder = "assets/css/fonts/";
				$pathdir = $folder.$subfolder;
				$dir = opendir($pathdir);
				$zip->addEmptyDir($subfolder);
				while($file = readdir($dir))
				{
						if(is_file($pathdir.$file))
						{
							$zip->addFile($pathdir.$file, $subfolder.$file);
						}
				}

				$subfolder = "assets/fonts/";
				$pathdir = $folder.$subfolder;
				$dir = opendir($pathdir);
				$zip->addEmptyDir($subfolder);
				while($file = readdir($dir))
				{
						if(is_file($pathdir.$file))
						{
							$zip->addFile($pathdir.$file, $subfolder.$file);
						}
				}

				$subfolder = "assets/images/";
				$pathdir = $folder.$subfolder;
				$dir = opendir($pathdir);
				$zip->addEmptyDir($subfolder);
				while($file = readdir($dir))
				{
						if(is_file($pathdir.$file))
						{
							$zip->addFile($pathdir.$file, $subfolder.$file);
						}
				}

				$subfolder = "assets/js/";
				$pathdir = $folder.$subfolder;
				$dir = opendir($pathdir);
				$zip->addEmptyDir($subfolder);
				while($file = readdir($dir))
				{
						if(is_file($pathdir.$file))
						{
							$zip->addFile($pathdir.$file, $subfolder.$file);
						}
				}

				
		
				$zip->close();
				$info->zip_file = $zipfile;

			}

		}

	}
}

echo json_encode($info);