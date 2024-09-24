<!DOCTYPE html>
<html lang="en">
<head>
	<title> Room Allocation </title>
	<style>
		body{
			background-image: url(10.jpg);
			height:10vh;
			margin-bottom:-200px;
			
		}
	</style>
</head>
<body>
	<form action="<?php echo$_SERVER["PHP_SELF"]; ?>">
	Name: <input type="text" name="name" id="name">
	Roll Number: <input type="text" name="rollno" id="rollno">
	<label for="hostel"> Hostel: </label>
	<select name="hostel" id="hostel">
	<option value="barak" >Barak</option>
	<option value="bramhaputra">Bramhaputra</option>
	<option value="dhansiri">Dhansiri</option>
	<option value="dihing">Dihing</option>
	<option value="disang">Disang</option>
	<option value="gaurang">Gaurang</option>
	<option value="kameng">Kameng</option>
	<option value="kapili">Kapili</option>
	<option value="lohit">Lohit</option>
	<option value="siang">Siang</option>
	</select>
	<label for="roomno">Room Number:</label>
	<input type="text" name="roomno" id="roomno">