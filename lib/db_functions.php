<?php
require_once('helper.php');
session_start();
class db_function extends helper{

	//Get Blog Categories//
	public function get_blog_categories($category_id,$category_name,$category_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($category_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." category_id = ?";
			$data_type .= "i";
			array_push($exists,$category_id);
		}
		if($category_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " category_name = ?";
			$data_type .= "s";
			array_push($exists,$category_name);
		}
		if($category_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." category_status = ?";
			$data_type .= "i";
			array_push($exists,$category_status);
		}

		$where_append .=" ORDER BY category_id DESC";

		$categories_arr = $this->select_prepare("category_id,category_name,category_status","blog_categories",$where_append,"$data_type",$exists);

		return $categories_arr;
	}

	//Create/Update Blog Category //
	public function set_blog_category($category_id,$category_name){
		$response = array();

		if($category_id !=''){
			$query = "UPDATE blog_categories SET category_name=?, category_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE category_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$category_name,$category_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO blog_categories(category_name,category_added_date) VALUES(?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'))";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("s",$category_name);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		
	}

	//Delete BLOG Category//
	public function delete_blog_category($category_id){
		$response = array();
		$status = 0;
		if($category_id !=''){
			$query = "UPDATE blog_categories SET category_status=?, category_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE category_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("ii",$status,$category_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Category id not passed";
		}
		return $response;
	}

	// Get Roles//
	public function get_roles($role_id,$role_name,$role_status,$type=""){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($role_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." role_id = ?";
			$data_type .= "i";
			array_push($exists,$role_id);
		}
		if($role_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " role_name = ?";
			$data_type .= "s";
			array_push($exists,$role_name);
		}
		if($role_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." role_status = ?";
			$data_type .= "i";
			array_push($exists,$role_status);
		}
		if($type !=""){
			if($type == "insert"){

			}
			else if($type == "update"){
				$cond = ($where_append !="")?" AND":"";
				$where_append .= $cond." role_id != ?";
				$data_type .= "i";
				array_push($exists,$role_id);
			}
			else{
				$cond = "";
			}
		}

		$where_append .=" ORDER BY role_added_date DESC";

		$roles_arr = $this->select_prepare("role_id,role_name,role_description,role_status","roles",$where_append,"$data_type",$exists);

		return $roles_arr;
	}

	//Create/Update Roles//
	public function set_roles($role_id,$role_name,$role_description,$added_by){
		$response = array();

		if($role_id !=''){
			$query = "UPDATE roles SET role_name=?, role_description=?, role_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE role_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("ssi",$role_name,$role_description,$role_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Role Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO roles(role_name,role_description,role_added_date) VALUES(?,?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'))";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("ss",$role_name,$role_description);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Role Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		
	}

	// Get Admin Panel Screens//
	public function get_screens($screen_id,$screen_name,$screen_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($screen_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." screen_id = ?";
			$data_type .= "i";
			array_push($exists,$screen_id);
		}
		if($screen_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " screen_name = ?";
			$data_type .= "s";
			array_push($exists,$screen_name);
		}
		if($screen_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." screen_status = ?";
			$data_type .= "i";
			array_push($exists,$screen_status);
		}

		$where_append .=" ORDER BY screen_added_date DESC";
		$screens_arr = $this->select_prepare("screen_id,screen_name,screen_status","screens",$where_append,"$data_type",$exists);

		return $screens_arr;
	}

	//Create/Update  User -Changes Required// 
	public function set_user($user_id,$user_name,$user_first_name,$user_last_name,$user_email,$user_role_id){
		$response = array();

		if($role_id !=''){
			$query = "UPDATE user SET role_name=?, role_description=?, role_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE role_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("ssi",$role_name,$role_description,$role_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Role Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO roles(role_name,role_description,role_added_date) VALUES(?,?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'))";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("ss",$role_name,$role_description);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Role Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		

	}

    //Get Blogs //
	public function get_blogs($blog_id,$blog_name,$blog_category_id,$blog_publish_date,$slug_name,$blog_status,$type=""){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($blog_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." blog_id = ?";
			$data_type .= "i";
			array_push($exists,$blog_id);
		}
		if($blog_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " blog_name = ?";
			$data_type .= "s";
			array_push($exists,$blog_name);
		}
		if($blog_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." blog_status = ?";
			$data_type .= "s";
			array_push($exists,$blog_status);
		}

		if($blog_category_id !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." blog_category_id = ?";
			$data_type .= "i";
			array_push($exists,$blog_category_id);
		}

		if($blog_publish_date !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." blog_publish_date = ?";
			$data_type .= "i";
			array_push($exists,$blog_publish_date);
		}

		if($slug_name != ""){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." slug_name = ?";
			$data_type .= "s";
			array_push($exists,$slug_name);
		}

		if($type == "recent"){
			$where_append .=" ORDER BY blog_publish_date DESC ";
		}
		else{
			$where_append .=" ORDER BY blog_id DESC";
		}
		
		$blogs_arr = $this->select_prepare("blog_id,blog_name,blog_author_name,blog_category_id,blog_image,blog_video,blog_publish_date,blog_description,short_description,slug_name,blog_status","blogs",$where_append,"$data_type",$exists);

		return $blogs_arr;
	}

    //Filter Blogs//
	public function filter_blogs($sel_category,$page,$search){
		$response = array();
		$blog_arr = array();
		$current_date = date('Y-m-d H:i:s');

		//Initializing variables//
		$cat_condition = "";
		$search_from_append = "";
		$search_condition = "";
		$data_type = 'si';
		array_push($blog_arr,1,1);

		$order_by = ' ORDER BY B.blog_publish_date DESC';
		//If category id is not equal to 0, Set the condition//
		if($sel_category != '' && is_numeric($sel_category) && $sel_category != 0){
			$cat_condition.= ' AND B.blog_category_id = ? ';
			array_push($blog_arr, $sel_category);
			$data_type.='i';
		}
		//If search value is passed //
		if($search !== ''){
			/*$search_from_append.=" INNER JOIN blog_categories AS CAT ON CAT.category_id = B.blog_category_id ";*/

			$search_condition.= " AND (CAT.category_name LIKE ? OR B.blog_name LIKE ? OR B.blog_author_name LIKE ? OR B.blog_meta_title=? OR B.blog_tags LIKE ?) ";
			$search_like = "%".$search."%";
			array_push($blog_arr, $search_like, $search_like, $search_like, $search_like, $search_like);
			$data_type.='sssss';
		}

		$select_append = "B.blog_id, B.blog_name, B.blog_author_name, B.blog_category_id, B.blog_image, B.blog_video,B.blog_publish_date,B.blog_description,B.short_description,B.slug_name,B.blog_status,CAT.category_id,CAT.category_name ";

		$from_append = " blogs B INNER JOIN blog_categories CAT ON B.blog_category_id = CAT.category_id ";

		$where_append = " B.blog_status = ? AND CAT.category_status = ? AND B.blog_publish_date <='$current_date' ".$cat_condition."".$search_condition;

		$filter_result = $this->select_prepare($select_append, $from_append, $where_append.$order_by,$data_type, $blog_arr);
		if(is_array($filter_result) && !empty($filter_result)){
			$response['n'] = 1;
			$response['msg'] = 'Success';
			$response['data'] = array();
			$response['data'] = $filter_result;
		}
		else{
			$response['n'] = 0;
			$response['msg'] = 'No Blogs Found';
		}
		return $response;
	}
	
	//Get Jobs//
	public function get_jobs($job_id,$job_title,$job_desc,$job_close_date,$job_status,$type=""){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($job_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." job_id = ?";
			$data_type .= "i";
			array_push($exists,$job_id);
		}
		if($job_title !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " job_title = ?";
			$data_type .= "s";
			array_push($exists,$job_title);
		}
		if($job_desc != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." job_desc = ?";
			$data_type .= "s";
			array_push($exists,$job_desc);
		}
		if($job_close_date != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." job_close_date = ?";
			$data_type .= "s";
			array_push($exists,$job_close_date);
		}

		if($job_status !=""){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." status = ?";
			$data_type .= "s";
			array_push($exists,$job_status);
		}

		if($type == "get_front"){
			$current_date = date('Y-m-d');
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." job_close_date >= $current_date";
		}

		$where_append .=" ORDER BY job_id DESC";

		$jobs_arr = $this->select_prepare("job_id,job_title,job_desc,job_close_date,status","job_detail",$where_append,"$data_type",$exists);

		return $jobs_arr;
	}
	
	//Create/Update Job //
	public function set_job($job_id,$job_title,$job_desc,$job_close_date){
		$response = array();

		if($job_id !=''){
			$query = "UPDATE job_detail SET job_title=?,job_desc=?,job_close_date=?,updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE job_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("sssi",$job_title,$job_desc,$job_close_date,$job_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Job Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO job_detail(job_title,job_desc,job_close_date) VALUES(?,?,?)";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("sss",$job_title,$job_desc,$job_close_date);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Job Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		
	}
	
	//Delete Job//
	public function delete_job($job_id){
		$response = array();
		$status = '0';
		if($job_id !=''){
			$query = "UPDATE job_detail SET status=?,updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE job_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$status,$job_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Job Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Job id not passed";
		}
		return $response;
	}
    
    //Get Jobs//
	public function get_job_application($id,$name,$email,$created_date,$status,$type=""){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." id = ?";
			$data_type .= "i";
			array_push($exists,$id);
		}
		if($name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " name = ?";
			$data_type .= "s";
			array_push($exists,$name);
		}
		if($email != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." email = ?";
			$data_type .= "s";
			array_push($exists,$email);
		}
		if($created_date != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." created_date = ?";
			$data_type .= "s";
			array_push($exists,$created_date);
		}

		if($status !=""){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." status = ?";
			$data_type .= "s";
			array_push($exists,$status);
		}

		$where_append .=" ORDER BY id DESC";

		$jobs_arr = $this->select_prepare("id,name,email,created_date,status","job_application",$where_append,"$data_type",$exists);

		return $jobs_arr;
	}
	
    //Delete Job Application//
	public function delete_job_application($id){
		$response = array();
		$status = '0';
		if($id !=''){
			$query = "UPDATE job_application SET status=? WHERE id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$status,$id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Application Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Application id not passed";
		}
		return $response;
	}
	
	//Get Blog Comments//
	public function get_blog_comments($comment_id,$comment_author,$comment_author_email,$comment_blog_id,$comment_added_date,$comment_approved,$comment_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($comment_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." C.comment_id = ?";
			$data_type .= "i";
			array_push($exists,$comment_id);
		}
		if($comment_author !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " C.comment_author = ?";
			$data_type .= "s";
			array_push($exists,$comment_author);
		}
		if($comment_author_email !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " C.comment_author_email = ?";
			$data_type .= "s";
			array_push($exists,$comment_author_email);
		}
		if($comment_blog_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." C.comment_blog_id = ?";
			$data_type .= "i";
			array_push($exists,$comment_blog_id);
		}
		if($comment_added_date !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " C.comment_added_date = ?";
			$data_type .= "s";
			array_push($exists,$comment_added_date);
		}
		if($comment_approved != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." C.comment_approved = ?";
			$data_type .= "i";
			array_push($exists,$comment_approved);
		}
		if($comment_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." C.comment_status = ?";
			$data_type .= "s";
			array_push($exists,$comment_status);
		}

		$where_append .=" ORDER BY C.comment_added_date DESC";

		$comments_arr = $this->select_prepare("C.comment_id,C.comment_text,C.comment_author,C.comment_author_email,C.comment_added_date,C.comment_updated_date,C.comment_blog_id,C.comment_approved,C.comment_status,B.blog_name","blog_comments C INNER JOIN blogs B ON C.comment_blog_id = B.blog_id",$where_append,"$data_type",$exists);

		return $comments_arr;
	}
	
	//Update Blog Comments //
	public function set_blog_comments($comment_id,$comment_text){
		$response = array();

		if($comment_id !=''){
			$query = "UPDATE blog_comments SET comment_text=?, comment_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE comment_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$comment_text,$comment_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Comment Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Comment id is not set";
		}
		return $response;		
	}
	
	//Delete BLOG Comments//
	public function delete_blog_comment($comment_id){
		$response = array();
		$status = '0';
		if($comment_id !=''){
			try{
				$this->conn->autocommit(FALSE);
				$query = "UPDATE blog_comments SET comment_status=?, comment_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE comment_id = ?";

				if($stmt_query= $this->conn->prepare($query)){
					$stmt_query->bind_param("si",$status,$comment_id);
					$stmt_query->execute();

					$get_replies = $this->get_replies('',$comment_id,'','','','1');
					if(is_array($get_replies) && !empty($get_replies) && $get_replies!=0){
						foreach($get_replies as $reply){
							$remove_reply = $this->delete_reply($reply['reply_id']);
						}
					}
					$this->conn->commit();
					$response['n'] = 1;
					$response['msg'] = "Category Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}				
			}
			catch(Exception $e){
				$this->conn->rollback();
				$response['n'] = 0;
				$response['msg'] = $e->getMessage();
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Comment id not passed";
		}
		return $response;
	}
	
	//Get Comment Replies//
	public function get_replies($reply_id,$reply_comment_id,$reply_author,$reply_added_date,$reply_approved,$reply_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($reply_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." R.reply_id = ?";
			$data_type .= "i";
			array_push($exists,$reply_id);
		}
		if($reply_comment_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." R.reply_comment_id = ?";
			$data_type .= "i";
			array_push($exists,$reply_comment_id);
		}
		if($reply_author !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " R.reply_author = ?";
			$data_type .= "s";
			array_push($exists,$reply_author);
		}
		if($reply_added_date !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " R.reply_added_date = ?";
			$data_type .= "s";
			array_push($exists,$reply_added_date);
		}
		if($reply_approved != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." R.reply_approved = ?";
			$data_type .= "i";
			array_push($exists,$reply_approved);
		}
		if($reply_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." R.reply_status = ?";
			$data_type .= "s";
			array_push($exists,$reply_status);
		}

		$where_append .=" ORDER BY R.reply_added_date DESC";

		$reply_arr = $this->select_prepare("R.reply_id,R.reply_text,R.reply_author,R.reply_comment_id,R.reply_approved,R.reply_status,C.comment_id,C.comment_text,C.comment_blog_id,C.comment_approved,C.comment_status","blog_replies R LEFT JOIN blog_comments C ON C.comment_id = R.reply_comment_id",$where_append,"$data_type",$exists);

		return $reply_arr;
	}
	
	//Delete Replies//
	public function delete_reply($reply_id){
		$response = array();
		$status = 0;
		if($reply_id !=''){
			$query = "UPDATE blog_replies SET reply_status=?, reply_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE reply_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$status,$reply_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Reply Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Reply id not passed";
		}
		return $response;
	}
	
	//Set/Unset Approval for Comments to be displayed
	public function change_comment_approval($comment_id,$comment_approved){
		$response = array();
		if($comment_approved == 1){
			$change_approval = 0;
			$msg = "Comment Disapproved";
		}
		else{
			$change_approval = 1;
			$msg = "Comment Approved";
		}

		$query = "UPDATE blog_comments SET comment_approved=?, comment_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE comment_id = ?";

		if($stmt_query= $this->conn->prepare($query)){
			$stmt_query->bind_param("ii",$change_approval,$comment_id);

			if($stmt_query->execute()){
				$response['n'] = 1;
				$response['msg'] = $msg;
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = $this->conn->error;
		}
		
		return $response;
	}
	
	//Set/Unset Approval for Replies to be displayed
	public function change_reply_approval($reply_id,$reply_approved){
		$response = array();
		if($reply_approved == 1){
			$change_approval = 0;
			$msg = "Reply Disapproved";
		}
		else{
			$change_approval = 1;
			$msg = "Reply Approved";
		}

		$query = "UPDATE blog_replies SET reply_approved=?, reply_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE reply_id = ?";

		if($stmt_query= $this->conn->prepare($query)){
			$stmt_query->bind_param("ii",$change_approval,$reply_id);

			if($stmt_query->execute()){
				$response['n'] = 1;
				$response['msg'] = $msg;
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = $this->conn->error;
		}
		
		return $response;
	}
	
	
	public function set_replies($reply_data){
		$response = array();

		foreach($reply_data as $reply){
			$query = "UPDATE blog_replies SET reply_author=?,reply_text=?, reply_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE reply_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("ssi",$reply['author_name'],$reply['reply_text'],$reply['reply_id']);
				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Reply Updated Successfully";
				}
				else{
					break;
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}		
		}
		return $response;
	}
	
	//Get Products//
	public function get_products($product_id,$product_name,$product_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($product_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." product_id = ?";
			$data_type .= "i";
			array_push($exists,$product_id);
		}
		if($product_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " product_name = ?";
			$data_type .= "s";
			array_push($exists,$product_name);
		}
		if($product_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." product_status = ?";
			$data_type .= "s";
			array_push($exists,$product_status);
		}

		$where_append .=" ORDER BY product_id DESC";

		$products_arr = $this->select_prepare("product_id,product_name,product_description,product_feature_image,product_status","products",$where_append,"$data_type",$exists);

		return $products_arr;
	}
	
	//Create/Update Products //
	public function set_products($product_id,$product_name,$product_description,$product_image,$slug_name){
		$response = array();

		if($product_id !=''){
			$query = "UPDATE products SET product_name=?,product_description=?,product_feature_image=?,product_slug_name=?,product_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE product_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("ssssi",$product_name,$product_description,$product_image,$slug_name,$product_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Product Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO products(product_name,product_description,product_feature_image,product_slug_name) VALUES(?,?,?,?)";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("ssss",$product_name,$product_description,$product_image,$slug_name);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Product Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		
	}
	
	//Delete Product//
	public function delete_product($product_id){
		$response = array();
		$status = '0';
		if($product_id !=''){
			$query = "UPDATE products SET product_status=?, product_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE product_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$status,$product_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Product Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Product id not passed";
		}
		return $response;
	}
	
	
	
	//Get Download Categories//
	public function get_download_categories($category_id,$category_name,$category_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($category_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dc_id = ?";
			$data_type .= "i";
			array_push($exists,$category_id);
		}
		if($category_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " dc_name = ?";
			$data_type .= "s";
			array_push($exists,$category_name);
		}
		if($category_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dc_status = ?";
			$data_type .= "s";
			array_push($exists,$category_status);
		}

		$where_append .=" ORDER BY dc_id DESC";

		$categories_arr = $this->select_prepare("dc_id,dc_name,dc_status","download_categories",$where_append,"$data_type",$exists);

		return $categories_arr;
	}

	//Create/Update Download Category //
	public function set_download_category($category_id,$category_name){
		$response = array();

		if($category_id !=''){
			$query = "UPDATE download_categories SET dc_name=?, dc_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE dc_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$category_name,$category_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO download_categories(dc_name,dc_added_date) VALUES(?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'))";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("s",$category_name);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		
	}

	//Delete BLOG Category//
	public function delete_download_category($category_id){
		$response = array();
		$status = '0';
		if($category_id !=''){
			$query = "UPDATE download_categories SET dc_status=?, dc_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE dc_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$status,$category_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Category id not passed";
		}
		return $response;
	}


	public function set_download($d_id,$d_title,$d_cat_id,$file){
		$response = array();

		if($d_id !=''){
			$query = "UPDATE job_detail SET job_title=?,job_desc=?,job_close_date=?,updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE job_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("sssi",$job_title,$job_desc,$job_close_date,$job_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Job Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO download_master(dm_title,dc_id,dm_file_name,dm_created_date) VALUES(?,?,?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'))";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("sis",$d_title,$d_cat_id,$file);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Download Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		
	}


/*	public function get_downloads($dm_id,$dc_id,$dm_title,$dm_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($dm_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dm_id = ?";
			$data_type .= "i";
			array_push($exists,$dm_id);
		}
		if($dc_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dc_id = ?";
			$data_type .= "i";
			array_push($exists,$dc_id);
		}
		if($dm_title != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dm_title = ?";
			$data_type .= "s";
			array_push($exists,$dm_title);
		}
		if($dm_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dm_status = ?";
			$data_type .= "s";
			array_push($exists,$dm_status);
		}

		$where_append .=" ORDER BY dm_id DESC";

		$downloads_arr = $this->select_prepare("DM.dm_id,DM.dc_id,DM.dm_title,DM.dm_file_name,DM.dm_status,DC.dc_name","download_master as DM INNER JOIN download_categories DC ON DC.dc_id = DM.dc_id",$where_append,"$data_type",$exists);

		return $downloads_arr;
	}
	*/
	
	public function get_downloads($dm_id,$dc_id,$dm_title,$dm_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($dm_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dm_id = ?";
			$data_type .= "i";
			array_push($exists,$dm_id);
		}
		if($dc_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dc_id = ?";
			$data_type .= "i";
			array_push($exists,$dc_id);
		}
		if($dm_title != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dm_title = ?";
			$data_type .= "s";
			array_push($exists,$dm_title);
		}
		if($dm_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." dm_status = ?";
			$data_type .= "s";
			array_push($exists,$dm_status);
		}

		$where_append .=" ORDER BY dm_id DESC";

		$downloads_arr = $this->select_prepare("dm_id,dc_id,dm_title,dm_file_name,dm_status","download_master",$where_append,"$data_type",$exists);

		return $downloads_arr;
	}



	public function delete_download_link($dm_id){
		$response = array();
		$status = '0';
		if($dm_id !=''){
			$query = "UPDATE download_master SET dm_status=?,dm_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE dm_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$status,$dm_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Download Link Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Download link not passed";
		}
		return $response;
	}


	public function get_hashed_password($user_id,$user_name){
		$user_arr = array();
		$param = "";
		$where_append = "";

		if($user_name != ""){
			$param .= "s";
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." user_email=? ";
			array_push($user_arr, $user_name);
		}

		if($user_id != ""){
			$param .= "i";
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." user_id = ?";
			array_push($user_arr,$user_id);
		}

		$cond = ($where_append !="")?" AND":"";
		$where_append .= $cond." user_status = ?";
		$param .= "s";
		array_push($user_arr,1);
		
		$is_user = $this->select_prepare("user_id, user_status, user_role,user_email,user_password","user","$where_append","$param",$user_arr);

		return $is_user;
	}


	public function login($um_email, $um_password, $lh_ip, $lh_browser, $lh_platform){
		$response = array();
		$user_arr = array();
		array_push($user_arr, $um_email,$um_password, 1);
		//print_r($lh_platform);
		$is_user = $this->select_prepare("user_id, user_status, user_role,user_email","user","user_email=?  AND user_password = ? AND status = ? ","sss",$user_arr);
		//print_r($is_user);exit;
		
		/*$is_user = $this->select_prepare("U.user_id, U.user_role_id, R.role_landing_page","user AS U INNER JOIN role_master AS R ON U.user_role_id = R.role_id","(U.user_name=? OR U.user_email=?) AND U.user_password=? AND U.user_status=?","ssss",$user_arr);*/
		//print_r($is_user);
		if(is_array($is_user)){ 
			$lh_attempt_type = 1;
			$history = $this->login_history_insert($is_user[0]['user_id'], $lh_ip, $lh_browser, $lh_platform, $lh_attempt_type);
			// print_r($history);
			// exit();
			if($history['n'] == 1){
				if ($is_user[0]['user_status'] == '1' ) {
					$response['n'] = 1;
					$response['msg'] = "Login Successful";
					$response['user_id'] = $is_user[0]['user_id'];
					$response['user_role'] = $is_user[0]['user_status'];
					$response['user_email'] = $is_user[0]['user_email'];

					//$response['role_land;ing_page'] = $is_user[0]['role_landing_page'];
				}
				else{
					$response['n'] = 2;
					$response['msg'] = "Access Denied";
				}
			}
			else{
				$response['n'] = $history['n'];
				$response['msg'] ="try history";
			}
		}
		else{
			$lh_user_id = 0;
			$lh_attempt_type = 2;
			$history = $this->login_history_insert($lh_user_id, $lh_ip, $lh_browser, $lh_platform, $lh_attempt_type);
			print_r($history);exit;
			if($history['n'] == 1){
				$response['n'] = 2;
				$response['msg'] = "Invalid Credentials";
			}
			else{
				$response['n'] = $history['n'];
				$response['msg'] = "No histroy found";
			}
		}
		return $response;
	}



	private function login_history_insert($user_id, $lh_ip, $lh_browser, $lh_platform, $lh_attempt_type){
		$response = array();
		$insert_login_history = "INSERT INTO login_history (lh_user_id, lh_ip, lh_browser, lh_platform, lh_attempt_type) VALUES (?, ?, ?, ?, ?)";
		if($stmt_login_history = $this->conn->prepare($insert_login_history)){
			$stmt_login_history->bind_param("issss", $user_id, $lh_ip, $lh_browser, $lh_platform, $lh_attempt_type );
			if($stmt_login_history->execute()){
				$response['n'] = 1;
				$response['msg'] = "Success";
				//print_r("Success");
			}
			else{
				$response['n'] = 0;
				$response['msg'] = "Internal Server Error";
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Internal Server Error";
			$response['msg'] = $this->conn->error;
		}
		return $response;
	}

	public function insert_user_downloaded_file($dm_id,$user_id){
		$response = array();
		$insert_login_history = "INSERT INTO download_mapping (u_id, dm_id, d_cretaed_date) VALUES (?, ?, CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') )";
		if($stmt_login_history = $this->conn->prepare($insert_login_history)){
			$stmt_login_history->bind_param("ii", $user_id, $dm_id);
			if($stmt_login_history->execute()){
				$response['n'] = 1;
				$response['msg'] = "Success";
				//print_r("Success");
			}
			else{
				$response['n'] = 0;
				$response['msg'] = "Internal Server Error";
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Internal Server Error";
			$response['msg'] = $this->conn->error;
		}
		return $response;
	}
	
	
	
	public function registration_check($user_id,$email)  
	{
		$exists = array();
		$where_append = "";
		$data_type = "ss";

		array_push($exists,1,$email);

		if($user_id!=''){
			array_push($exists,$user_id);
			$where_append = " AND user_id!=?";
			$data_type .="i";
		}

		return $regCheck = $this->select_prepare("*","user","status=? AND user_email=?  AND user_status='1' $where_append","$data_type",$exists);
	}


	public function register_user($first_name,$last_name,$user_email,$phone_number,$user_password)
	{
		$response = array();
		$role = 2;
		$status = 1;

		
			$query = "INSERT INTO user (user_first_name, user_last_name, user_email, user_phone, user_password,user_status,user_date) VALUES (?, ?, ?, ?, ?, ?, CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'))";

			if($stmt = $this->conn->prepare($query)){

				$stmt->bind_param("ssssss", $first_name, $last_name, $user_email, $phone_number ,$user_password,$status);

				if($stmt->execute()){
					$response['n'] = 1;
					$response['msg'] = "User Added Successfully";
				}
				else{
					$response['n'] = 0;
					//$response['msg'] = "Internal Server Error";
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				//$response['msg'] = "Internal Server Error";
				$response['msg'] = $this->conn->error;
			}
		
		return $response;
	}
	
	
	public function delete_download_category_master($cat){

		
		$response = array();
		$status = '0';
		if($cat !=''){
			$query = "UPDATE download_master SET dm_status=?,dm_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE dc_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$status,$cat);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Download category Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Download link not passed";
		}
		return $response;
	}
	
	//Media Section
	
	//Get media Categories//
	public function get_media_categories($category_id,$category_name,$category_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($category_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." category_id = ?";
			$data_type .= "i";
			array_push($exists,$category_id);
		}
		if($category_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " category_name = ?";
			$data_type .= "s";
			array_push($exists,$category_name);
		}
		if($category_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." category_status = ?";
			$data_type .= "i";
			array_push($exists,$category_status);
		}

		$where_append .=" ORDER BY category_id DESC";

		$categories_arr = $this->select_prepare("category_id,category_name,category_status","media_categories",$where_append,"$data_type",$exists);

		return $categories_arr;
	}

	//Create/Update media Category //
	public function set_media_category($category_id,$category_name){
		$response = array();

		if($category_id !=''){
			$query = "UPDATE media_categories SET category_name=?, category_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE category_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$category_name,$category_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO media_categories(category_name,category_added_date) VALUES(?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'))";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("s",$category_name);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		
	}

	//Delete media Category//
	public function delete_media_category($category_id){
		$response = array();
		$status = 0;
		if($category_id !=''){
			$query = "UPDATE media_categories SET category_status=?, category_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE category_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("ii",$status,$category_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Category Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Category id not passed";
		}
		return $response;
	}
	
	//Get medias //
	public function get_medias($media_id,$media_name,$media_category_id,$media_publish_date,$slug_name,$media_status,$type=""){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($media_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." media_id = ?";
			$data_type .= "i";
			array_push($exists,$media_id);
		}
		if($media_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " media_name = ?";
			$data_type .= "s";
			array_push($exists,$media_name);
		}
		if($media_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." media_status = ?";
			$data_type .= "s";
			array_push($exists,$media_status);
		}

		if($media_category_id !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." media_category_id = ?";
			$data_type .= "i";
			array_push($exists,$media_category_id);
		}

		if($media_publish_date !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." media_publish_date = ?";
			$data_type .= "i";
			array_push($exists,$media_publish_date);
		}

		if($slug_name != ""){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." slug_name = ?";
			$data_type .= "s";
			array_push($exists,$slug_name);
		}

		if($type == "recent"){
			$where_append .=" ORDER BY media_publish_date DESC ";
		}
		else{
			$where_append .=" ORDER BY media_id DESC";
		}
		
		$medias_arr = $this->select_prepare("media_id,media_name,media_category_id,media_image,media_video,media_publish_date,media_description,short_description,slug_name,media_status","medias",$where_append,"$data_type",$exists);

		return $medias_arr;
	}
	
	
	
	public function get_album($album_id,$album_name,$album_status){
		$exists = array();
		$where_append = "";
		$data_type = "";

		if($album_id != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." album_id = ?";
			$data_type .= "i";
			array_push($exists,$album_id);
		}
		if($album_name !=''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond. " album_name = ?";
			$data_type .= "s";
			array_push($exists,$album_name);
		}
		if($album_status != ''){
			$cond = ($where_append !="")?" AND":"";
			$where_append .= $cond." album_status = ?";
			$data_type .= "i";
			array_push($exists,$album_status);
		}

		$where_append .=" ORDER BY album_id DESC";

		$categories_arr = $this->select_prepare("album_id,album_name,album_status","album_master",$where_append,"$data_type",$exists);

		return $categories_arr;
	}


	public function set_album($album_id,$album_name){
		$response = array();

		if($album_id !=''){
			$query = "UPDATE album_master SET 	album_name=?, album_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE album_id = ?";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("si",$album_name,$album_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Album Updated Successfully";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			} 
		}
		else{
			$query = "INSERT INTO album_master(album_name,album_added_date) VALUES(?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'))";

			if($stmt_query = $this->conn->prepare($query)){
				$stmt_query->bind_param("s",$album_name);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Album Added Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		return $response;		
	}



	public function delete_album($album_id){
		$response = array();
		$status = 0;
		if($album_id !=''){
			$query = "UPDATE album_master SET album_status=?, album_updated_date=CONVERT_TZ(NOW(), @@session.time_zone, '+5:30') WHERE album_id = ?";

			if($stmt_query= $this->conn->prepare($query)){
				$stmt_query->bind_param("ii",$status,$album_id);

				if($stmt_query->execute()){
					$response['n'] = 1;
					$response['msg'] = "Album Deleted Successfully.";
				}
				else{
					$response['n'] = 0;
					$response['msg'] = $this->conn->error;
				}
			}
			else{
				$response['n'] = 0;
				$response['msg'] = $this->conn->error;
			}
		}
		else{
			$response['n'] = 0;
			$response['msg'] = "Album id not passed";
		}
		return $response;
	}
}


$obj_dba_func = new db_function();

?>
