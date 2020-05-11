<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../classess/Admin.php');
	$ad = new Admin();
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$adminData = $ad->getAdminData($_POST);
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
					<td><input type="password" id="adminPass" name="adminPass"/></td>
				</tr>
				<tr>
					<td>ShowPass</td>
					<td><input type="button" id="showpassword" value="show"></td>
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
	<script src="../js/jquery.js"></script>
	<!-- <tr><td><input type="button" id="showpassword" value="show password"></td></tr> -->
	<script>
		$(document).ready(function(){
			$("#showpassword").on("click", function(){
				var passwordField = $("#adminPass");
				var passwordFieldType = passwordField.attr("type");
				if(passwordFieldType == 'password'){
					passwordField.attr("type", "text");
					$(this).text('Hide');
				}else{
					passwordField.attr("type", "password");
					$(this).text('Show');
				}
			});
		});
	</script>
	<?php include 'inc/footer.php'; ?>