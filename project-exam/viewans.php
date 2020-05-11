<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$Total = $exm->getTotalRows();
?>
<div class="main">
	<!-- <h1>Question 1 of 10</h1> converted below -->
	<!-- <h1>Question <?php /* echo $question['quesNo']. " of ". $total; */ ?></h1> -->
	<h1>All Questions & ans of <?php echo $Total; ?></h1>
	<div class="test">
		<?php
			$getQues = $exm->getQuesByOrder();
			if ($getQues) {
				while($question = $getQues->fetch_assoc()){
		?>
		<table>
			<tr>
				<td colspan="2">
					<h3>Que <?php echo $question['quesNo']; ?> : <?php echo $question['ques']; ?></h3>
				</td>
			</tr>
			<?php
				$number = $question['quesNo'];
				$answer   = $exm->getAnswer($number);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) {
			?>
			<tr>
				<td>
					<input type="radio"/>
					<?php
						if ($result['rightAns'] == '1') {
							echo "<span style='color:blue'>".$result['ans']."</span>";
						}else{
						echo $result['ans'];
						}
					?>
				</td>
			</tr>
			<?php } } ?>
			<?php } } ?>
			
		</table>
		<a href="test.php?q=<?php echo $question['quesNo'];?>">Start Test</a>
	</div>
</div>
<?php include 'inc/footer.php'; ?>