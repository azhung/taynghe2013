
<?php include_once('view/_header.php'); ?>
			<h1>Log in to Gordon&#39;s Crown</h1>
			<!-- feedback message comes here -->			
				<?php echo $thongtin; ?><br />
			<form action="" method="post">
				<fieldset class="input">
					<div class="text">
						<label for="email">E-Mail or nickname:</label>
						<input type="text" name="email" id="email" value="" />
						<span class="message"></span>
					</div>
					<div class="text">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" value="" />
						<span class="message"></span>
					</div>
				</fieldset>
				<fieldset class="submit">
					<div class="submit">
						<input type="submit" value="Log in" name="ok" />
					</div>
				</fieldset>
			</form>
<?php include_once('view/_footer.php'); ?>          