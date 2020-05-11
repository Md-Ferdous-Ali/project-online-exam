<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classess/User.php');
	$usr = new User();
?>
<?php
	if (isset($_GET['dis'])) {
		$dblid   = (int)$_GET['dis'];
		$dblUser = $usr->DisableUser($dblid);
	}
	if (isset($_GET['ena'])) {
		$enblid   = (int)$_GET['ena'];
		$enblUser = $usr->enableUser($enblid);
	}
	if (isset($_GET['del'])) {
		$delid   = (int)$_GET['del'];
		$delUser = $usr->deleteUser($delid);
	}
?>
<div class="main">
	<h1>Admin Panel: Manage Users</h1>
	<?php if(isset($dblUser)) {
		echo $dblUser;
	} ?>
	<?php if(isset($enblUser)) {
		echo $enblUser;
	} ?>
	<?php if(isset($delUser)) {
		echo $delUser;
	} ?>
	<div class="manageuser">
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php
				$userData = $usr->getAllUser();
				if($userData){
					$i = 0;
					while ($result = $userData->fetch_assoc()) {
					$i++;
			?>
			<tr>
				<td>
					<?php if($result['status'] == '1'){
							echo '<span class="error">'.$i.'</span> ';
						}else{ echo $i; }
					?>
				</td>
				<td>
					<?php  if($result['status'] == '1'){
						echo '<span class="error">'.$result['name'].'</span> ';
						}else{ echo $result['name'];}
					?>
				</td>
				<td>
					<?php  if($result['status'] == '1'){
						echo '<span class="error">'.$result['username'].'</span> ';
						}else{ echo $result['username'];}
					?>
				</td>
				<td>
					<?php  if($result['status'] == '1'){
						echo '<span class="error">'.$result['email'].'</span> ';
						}else{ echo $result['email'];}
					?>
				</td>
				<td>
					<?php if ($result['status'] == '0') {?>
					<a onclick="return confirm('Are You Sure to Disable !')" href="?dis=<?php echo $result['userid']; ?>">Disable</a>
					<?php } else { ?>
					<a onclick="return confirm('Are You Sure to Enable !')" href="?ena=<?php echo $result['userid']; ?>">Enable</a>
					<?php } ?>
					
					|| <a onclick="return confirm('Are You Sure to Remove !')" href="?del=<?php echo $result['userid']; ?>">Remove</a>
				</td>
			</tr>
			<?php } } ?>
		</table>
	</div>
	
</div>
<?php include 'inc/footer.php'; ?>