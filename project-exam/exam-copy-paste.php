<!-- ===============config/config.php============= -->
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "db_exam");
?>

<!-- =================lib/Database.php=============== -->
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../config/config.php');

Class Database{
	public $host   = DB_HOST;
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;
	
	
	public $link;
	public $error;
	
	public function __construct(){
		$this->connectDB();
	}
	
	private function connectDB(){
	$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
	if(!$this->link){
		$this->error ="Connection fail".$this->link->connect_error;
		return false;
	}
 }
	
	// Select or Read data
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	
	// Insert data
	public function insert($query){
	$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($insert_row){
		return $insert_row;
	} else {
		return false;
	}
  }
      // Update data
  	public function update($query){
	$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($update_row){
		return $update_row;
	} else {
		return false;
	}
  }
  
  //Delete data
   public function delete($query){
	$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($delete_row){
		return $delete_row;
	} else {
		return false;
	}
  }
 
}
?>

<!-- ====================lib/Session.php ============================ -->
<?php
class Session{
	 public static function init(){
	 	session_start();
	 }
	 
	 public static function set($key, $val){
	 	$_SESSION[$key] = $val;
	 }

	 public static function get($key){
	 	if (isset($_SESSION[$key])) {
	 		return $_SESSION[$key];
	 	} else {
	 		return false;
	 	}
	 }

	 public static function checkSession(){
	 	self::init();
	 	if (self::get("login") == false) {
	 		self::destroy();
	 		header("Location:login.php");
	 	}
	 }

	 public static function checkLogin(){
	 	self::init();
	 	if (self::get("login") == true) {
	 		header("Location:index.php");
	 	}
	 }

	 public static function destroy(){
	 	session_destroy();
	 	header("Location:login.php");
	 }
}

?>

<!-- =====================admin/inc/loginheader.php================== -->
<?php 
    include_once ("../lib/Session.php");
    include_once ("../lib/Database.php");
    include_once ("../helpers/Format.php");
	Session::init();

	$db  = new Database();
	$fm  = new Format();
?>

<!-- ==================== admin/login.php ============================-->
<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../classess/Admin.php');
	$ad = new Admin();
?>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$adminData = $ad->getAdminData($_POST);//classess/Admin.php
	}

 ?>

<div class="main">
<h1>Admin Login</h1>
<div class="adminlogin">
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="adminUser"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="adminPass"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php if (isset($adminData)) {
						echo $adminData;
					} ?>
				</td>
			</tr>
		</table>
	</from>
</div>
</div>
<?php include 'inc/footer.php'; ?>

