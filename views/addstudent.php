<?php 	?><body class="newStudent">	<img id="logo" src="images/logo-app.png" alt="logo-app" width="255" height="50">	<div id="container">				<a id="back" href="?controller=course&cid=<? echo $data?>">Back</a>		<a id="logout" href="">Logout</a>				<form name="newStudent" action="?controller=course&action=newaction&cid=<? echo $data?>" method="post" enctype="multipart/form-data">			<div class="left">			<p>Student ID: </p>			<input id="studentID" type="text" value="" name="studentID" />            <p id="error"></p>						</div>            <div class="left">				<p>First Name: </p>				<input type="text" value="" name="firstName" />             </div>                        <div class="last">				<p>Last Name: </p>				<input type="text" value="" name="lastName" />             </div>									<button id="submit" type="submit" value="submit" />		</form>	</div>	