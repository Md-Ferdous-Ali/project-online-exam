<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	
class Exam{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addQuestions($data){
		$quesNo   = mysqli_real_escape_string($this->db->link, $data['quesNo']);
		$ques     = mysqli_real_escape_string($this->db->link, $data['ques']);
		$ans      = array();
		$ans[1]   = mysqli_real_escape_string($this->db->link, $data['ans1']);
		$ans[2]   = mysqli_real_escape_string($this->db->link, $data['ans2']);
		$ans[3]   = mysqli_real_escape_string($this->db->link, $data['ans3']);
		$ans[4]   = mysqli_real_escape_string($this->db->link, $data['ans4']);
		$rightAns = mysqli_real_escape_string($this->db->link, $data['rightAns']);
		$query    = "INSERT INTO tbl_ques (quesNo, ques) VALUES ('$quesNo', '$ques')";
		$inserted_row = $this->db->insert($query);
		if ($inserted_row) {
			foreach ($ans as $key => $ansName) {
				if ($ansName != '') {
					if ($rightAns == $key) {
						$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo','1', '$ansName')";
					}else{
						$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo','0', '$ansName')";
					}
					$insertrow = $this->db->insert($rquery);
					if ($insertrow) {
						continue;
					}else{
						die("Error....");
					}
				}
			}
			$msg = "<span class='success'>Question added Successfully...</span> ";
			return $msg;
		}	
	}
	public function getAllUser(){
		$query = "SELECT * FROM tbl_user ORDER BY userid DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getQuesByOrder(){
		$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
		$result = $this->db->select($query);
		return $result;
	}
	public function delQuestion($quesNo){
		$tables = array("tbl_ques", "tbl_ans");
		foreach ($tables as $table) {
		$delquery   = "DELETE FROM $table WHERE quesNo = '$quesNo'";
		$delData = $this->db->delete($delquery);
		}
		if ($delData) {
			$msg = '<span class="success">Question Removed Successfully...</span>';
			return $msg;
		}else{
			$msg = '<span class="error">Error...Question Not Removed !</span>';
			return $msg;
		}
	}
	// To Get Total Number Of Rows
	public function getTotalRows(){
		$query     = "SELECT * FROM tbl_ques";
		$getResult = $this->db->select($query);
		$total     = $getResult->num_rows;
		return $total;
	}
	
	//Using for which number of question it is by taking whole data! starttest.php
	public function getQuestion(){
		$query   = "SELECT * FROM tbl_ques";
		$getData = $this->db->select($query);
		$result  = $getData->fetch_assoc();
		return $result;
	}
	// Using for which number of question it is by using parameter test.php
	public function getQuesByNumber($number){
		$query   = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
		$getData = $this->db->select($query);
		$result  = $getData->fetch_assoc();
		return $result;
	}
	
	//To get the 4 multiple choice question test.php
	public function getAnswer($number){
		$query   = "SELECT * FROM  tbl_ans WHERE quesNo = '$number'";
		$getData = $this->db->select($query);
		return $getData;
	}
}
?>