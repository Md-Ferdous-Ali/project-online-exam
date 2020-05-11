<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classess/Exam.php');
	$exm = new Exam();
?>
<style>
	.adminPanel{width:700px; color:#999; margin:20px auto 0;padding:10px;border:1px solid #ddd;}
</style>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$addQue = $exm->addQuestions($_POST);
	}
	//Get Total
	$total = $exm->getTotalRows();
	$next  = $total + 1;
?>
<div class="main">
	<h1 align="center">Admin Panel - Add Question</h1>
	<?php if (isset($addQue)) { echo $addQue;} ?>
	<div class="adminPanel">
		<form action="" method="POST">
			<table>
				<tr>
					<td>Quesion No</td>
					<td>:</td>
					<td><input type="number" value="<?php if(isset($next)){echo $next;}?>" name="quesNo" required style="width: 110px;margin-bottom: 10px;padding: 5px;border: 1px solid #ddd;">
				</td>
			</tr>
			<tr>
				<td>Quesion</td>
				<td>:</td>
				<td><input type="text" name="ques" placeholder="Enter question..." required style="width:550px"></td>
			</tr>
			<tr>
				<td>Choice One</td>
				<td>:</td>
				<td><input type="text" name="ans1" placeholder="Enter choice one..." required style="width:550px"></td>
			</tr>
			<tr>
				<td>Choice Two</td>
				<td>:</td>
				<td><input type="text" name="ans2" placeholder="Enter choice two..." required style="width:550px"></td>
			</tr>
			<tr>
				<td>Choice Three</td>
				<td>:</td>
				<td><input type="text" name="ans3" placeholder="Enter choice three..." required style="width:550px" ></td>
			</tr>
			<tr>
				<td>Choice Four</td>
				<td>:</td>
				<td><input type="text" name="ans4" placeholder="Enter choice four..." required style="width:550px"></td>
			</tr>
			<tr>
				<td>Correct No</td>
				<td>:</td>
				<td><input type="number" name="rightAns" required style="width: 110px;margin-bottom: 10px;padding: 5px;border: 1px solid #ddd;"></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><input type="submit" name="submit" value="Add A Question" style="padding:5px"></td>
			</tr>
		</table>
	</form>
</div>

</div>
<?php include 'inc/footer.php'; ?>