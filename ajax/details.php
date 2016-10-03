<?php
require(getenv("DOCUMENT_ROOT")."/functions/database.php");	
if ($_POST['bewerk'] == "factuur")
{
	$id = $_POST['id'];
	try{	
	$stmt = $db->prepare("UPDATE aanwezig SET gefactureerd = 'y' WHERE id =:id ORDER BY id");
	$stmt->execute(array(':id' => $id));
	}
	catch(Exception $e) {
    echo '<h2><font color=red>';
    var_dump($e->getMessage());
	die ('</h2></font> ');
}	
$_SESSION[ERROR] = "Succesvol gemarkeerd als gefactureerd";		
}
if ($_POST['bewerk'] == "details")
{
	$id = $_POST['id'];
	try{
	$stmt = $db->prepare("DELETE FROM details WHERE id =:id ORDER BY id");
	$stmt->execute(array(':id' => $id));
	}
	catch(Exception $e) {
    echo '<h2><font color=red>';
    var_dump($e->getMessage());
	die ('</h2></font> ');
}	
$_SESSION[ERROR] = "Detail is succesvol verwijderd";		
}
?>
<script>
	function werkbij(val,dat) {
		$.ajax({
			type: "POST",
			url: "../ajax/details.php",
			data:'bewerk='+dat+'&id='+val,
			success: function(data){
				//alert(dat+" Succesvol uitgevoerd");
				window.location.reload();
			}
		});
	}
</script>
<?php if ($_POST['groep'] == "factuur")
{
?>
<table border=1 class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th><center>Zet Aanwezigheid <font color='red'>id <?php echo $_POST['waarde'];?></font> als gefactureerd ?</center></th>
		</tr>
	</thead>
	<tbody>	
		<tr class='info'>
			<td><center><button TYPE="submit" class='btn btn-danger' VALUE="delete" id="<?php echo $_POST['waarde']; ?>" onclick="werkbij(this.id,'factuur');"><i class="fi-checkbox"></i><span class="sr-only">Gefactureerd</span></button></center></td>
		</tr>
	</tbody>
</table>
<br>
<?php
}
if ($_POST['groep'] == "details")
{
?>
<table border=1 class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th><center>Verwijder Detail <font color='red'>id <?php echo $_POST['waarde'];?></font></center></th>
		</tr>
	</thead>
	<tbody>	
		<tr class='info'>
			<td><center><button TYPE="submit" class='btn btn-danger' VALUE="delete" id="<?php echo $_POST['waarde']; ?>" onclick="werkbij(this.id,'details');"><i class='material-icons' title='verwijder' aria-hidden='true'>delete_forever</i><span class="sr-only">verwijder</span></button></center></td>
		</tr>
	</tbody>
</table>
<br>
<?php
}
?>