<?php  include_once('stugum.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- <link rel="stylesheet" href="style.css"> -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
	td{
		text-align: center;
		cursor: pointer;
	}
</style>
	<title>CINEMA</title>
</head>
<body>
<table class="table">
<?php for($i=1;$i<10;$i++):?>
	<tr class="alert success">
	<?php for($j=1;$j<10;$j++):?>
		<?php if(isset($chear) && in_array($i.$j,$chear)):?>
			<td data-toggle="modal" class="alert-danger" id="<?php echo $i.$j ?>">SOLD</td>
		<?php else: ?>
		<td data-toggle="modal" data-target="#myModal" id="<?php echo $i.$j ?>"><?php echo $i.$j ?></td>
		<?php endif ?>
	<?php endfor ?>
	</tr>
<?php endfor ?>
</table>
<button id="new" class="btn btn-danger">NEW SEANS</button>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">BRONYA</h4>
      </div>
      <div class="modal-body">
        <p>BEST MOVIES IS THERE</p>
        <p>CHEAR ID:<b></b></p>
        <p><label for="chear">NAME</label><input type="text" id="chear"></p>

      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" data-dismiss="modal">BRONE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){
	$('td').click(function(event) {
		var chear = $(this).html();
		// console.log(chear);
		$('.modal-body>p>b').html(chear);
	});

	$('.btn-primary').click(function(event) {
		var chear = $('.modal-body>p>b').html();
		var name = $('#chear').val();
		if(!name || name.length<3) return false;
		//console.log(chear+":"+name);
		$.ajax({
			url:'brone.php',
			type:'POST',
			data:{'chear':chear,'name':name,},
			success:function(d){
				$('#'+chear).removeAttr('data-target').addClass('alert-danger').html("SOLD");
				$('#chear').val("");
			}
		})	
	});

	$('#new').click(function(event) {
		$.post('brone.php', {'action':'new'}, function(d) {
			$('td').removeClass('alert-danger').attr('data-target',"#myModal").html(function(){return $(this).attr('id')});
			
		});
	});

})
</script>



</body>
</html>