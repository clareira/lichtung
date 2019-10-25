<head>
<style>
body {
  background-color: black;
  text-align: center;
  color: white;
  font-family: "Courier New", Courier, monospace;
  margin-left: 15%;
  margin-right: 15%;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  max-width: 70%;
  height: auto;
}
</style>

<title> lichtung </title>
</head>
<body class="page_bg">

<br>
<br>
<b>lichtung</b>
<br>
<small>
clareira.org/?your message
</small>
<br>
<br>
<br>
<br>

<?php

$server="localhost";
$username="your_username";
$password="your_password";
$database = "your_db";

//get stuff after ? - main feature is a one liner
$raw_input = $_SERVER['QUERY_STRING'];
//make it into readable text
$input = urldecode($raw_input);

/* Create database  connection with correct username and password*/

$conn = new mysqli($servername,$username,$password,$database);

/* Check the connection is created properly or not */
if($connect->connect_error){
    echo "Connection error:" .$connect->connect_error;
}
else{
    //echo "Connected"."<br><br>";
}

//write stuff to db.
//in this example my table is your_db.whispers and has 2 collumns, whisper and id (used below). read README.md for more detailed instructions.
if (strlen($input)>0){
    if ($stmt = mysqli_prepare($conn,"INSERT INTO whispers (whisper) VALUE(?)")){
        mysqli_stmt_bind_param($stmt, "s", $input);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

//return stuff from db
$sql = "SELECT * FROM whispers ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($result);

if($num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
	$str = $row["whisper"];
//candy features: here you can filter the input by whatever and do whatever. In this example I make a shortcut to embed images using img()
        $img_pos = strpos($str,"img(");
        if ($img_pos !== false){
           $image = substr($str,$img_pos+4,-1);
           echo "<br>";
           ?>

<!--SOME HTML TO LOAD IMAGES-->
<img src="<?php	echo $image; ?>" alt=".">

<!--Apologies for the dirtyness-->

           <?php
           echo "<br>";
        }
        else{
	   //returns the querys
            echo "<br>".$str."<br>";
        }
    }
}
else{
    //message when db.table is empty
    echo "no whispers found for your query";
}

mysqli_close($conn);
?>





</body>
</html>
