<?php
require(getenv("DOCUMENT_ROOT")."/functions/database.php");
require(getenv("DOCUMENT_ROOT")."/functions/array.php");	
$out = array();
if ($_POST['groep'] >='1')
{
	$groep = $_POST['groep'];
	try{
		$stmt = $db->prepare("SELECT * FROM groep WHERE id=:groep");
		$stmt->execute(array(':groep' => $groep,));
		$result = $stmt->fetchall(PDO::FETCH_ASSOC);
		$grcount = $stmt->rowCount();
		if ($grcount > "0" )
		{
			foreach($result as $info) {
				$str = arr($info['user']);
				sort($str);
				$tel = count($str);
				if (!empty($str))
				{
					for($i=0;$i < $tel;$i++){
						$value = $str[$i];
						$stmtg = $db->prepare("SELECT * FROM gebruikers where id=:gebruiker");
						$stmtg->execute(array(':gebruiker' => $value,));
						$resultg = $stmtg->fetch(PDO::FETCH_ASSOC);			
						$out[] = array(
							$resultg['id'],
							$resultg['naam'],
							$info['id'],
							$info['naam'],
							);
										
					}	
				}
			}
		} // Geen Groep
} //end try
	catch(Exception $e) {
		echo '<h2><font color=red>';
		var_dump($e->getMessage());
		die ('</h2></font> ');
	}
}
else
{
	$out[] = array(
	"Geen id",
	"Geen Naam",
	"Geen Groep ID",
	"Geen Groep Naam",
	);
}//end else		
	$out2[data] = $out; 
	// output to the browser
	echo json_encode($out2);			
	?>