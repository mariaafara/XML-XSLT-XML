<?php



$xmlDoc=new DOMDocument();
$xmlDoc->load('dtd.xml');

$title=$_POST["rtitle"];
$date=$_POST["rdate"];
$attendance=$_POST["rattendance"];
$mpoints=$_POST["rpoints"];
$type=$_POST["rtype"];
//$file=$_POST["rtype"];

	//echo"===".$title."=".$type."<br>";
	//$meetings=$xmlDoc->childNodes->item(0);
$meetings=$xmlDoc->documentElement;
$meeting=$xmlDoc->createElement('meeting');

$typeAttribute=$xmlDoc->createAttribute('type');
$typeAttribute->value=$type;
$meeting->appendChild($typeAttribute);

	if( !empty($_POST["rid"]))//!empty($_POST["rid"]) &&
	{ 
		$id=$_POST["rid"];
	//	echo $id."<br>";
		$idAtrribute=$xmlDoc->createAttribute('id');
		$idAtrribute->value=$id;
		$meeting->appendChild($idAtrribute);
	}
	$titleElement=$xmlDoc->createElement('title',$title);
	$meeting->appendChild($titleElement);

	$dateElement=$xmlDoc->createElement('date',$date);
	$meeting->appendChild($dateElement);

	

	$attendee=explode(",",$attendance);
	$points=explode(",",$mpoints);

	
	$pointsElement=$xmlDoc->createElement('points');
	$attendanceElement=$xmlDoc->createElement('attendance');
	

	for($i=0;$i<sizeof($attendee);$i++)
	{
		$attendeElement=$xmlDoc->createElement('attendee',$attendee[$i]);
		$attendanceElement->appendChild($attendeElement);	
	}
	for($i=0;$i<sizeof($points);$i++)
	{
		$pointElement=$xmlDoc->createElement('point',$points[$i]);
		$pointsElement->appendChild($pointElement);	
	}
	
	$meeting->appendChild($pointsElement);
	$meeting->appendChild($attendanceElement);

	if( !empty($_POST["rcomments"]) )//&& isset($_POST["rcomments"]))//!empty($_POST["rcomments"]) &&
	{
		$comments=$_POST["rcomments"];
		$commentElement=$xmlDoc->createElement('comments',$comments);
		$meeting->appendChild($commentElement);
	}


   	// $file=$_FILE["rfile"]["name"];
   	//var_dump($file) ;//btetb3 kel lerrors
   	//$file=$_POST["rfile"];
   	// var_dump($file);
   	// die();
   //	$fileElement=$xmlDoc->createElement('file',$file);
   	//$meeting->appendChild($fileElement);

   	
   if( $_POST["rfile"]!=null )//&& isset($_POST["rcomments"]))//!empty($_POST["rcomments"]) &&
   {
   	$file=$_POST['rfile'];
   	$fileElement=$xmlDoc->createElement('file',$file);
   	$meeting->appendChild($fileElement);
   }

   $meetings->appendChild($meeting);

   if($xmlDoc->validate())
   	$xmlDoc->save('dtd.xml');
   else echo "failed";

   ?>