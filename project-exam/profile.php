<?php include 'inc/header.php'; ?>
<!-- to stop  getting other page by writing in the url bar
	few other codes to be given in all pages like Session::checkSession();
-->
<?php
Session::checkSession();
$userid = Session::get('userid');
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$updateUser = $usr->updateUserData($userid, $_POST);
	}
?>
<style>
	.profile{width: 440px;margin:0 auto;padding: 30px 50px 50px 138px;border:1px solid #ddd;}
	
</style>
<div class="main">
	<h1>Your Profile</h1>
	<div class="profile">
		<?php
			if(isset($updateUser)){
			echo $updateUser;
			}
		?>
		<form action="" method="post">
			<?php
				$getData = $usr->getUserData($userid);
				if($getData){
					//need not use while loop for taking single row only
					$result = $getData->fetch_assoc();
			?>
			<table class="tbl">
				<tr>
					<td>Name</td>
					<td><input name="name" value="<?php echo $result['name']; ?>" type="text"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input name="username" value="<?php echo $result['username']; ?>"  type="text"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input name="email" value="<?php echo $result['email']; ?>"  type="text"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="update" value="update">
				</td>
			</tr>
		</table>
		<?php } ?>
	</form>
</div>
</div>
<?php include 'inc/footer.php'; ?>