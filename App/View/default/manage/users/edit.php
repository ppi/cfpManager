<div class="well editaccount" style="margin-bottom: 0; padding-bottom: 0;">
		
	<form class="form-horizontal" style="margin-bottom: 0;" action="" method="post" id="user-form">
		<fieldset>
			<legend>Edit Your Account</legend>
			<div class="control-group">
				<label class="control-label" for="firstName">First Name</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="firstName" name="firstName" value="<?=$user->getFirstName(); ?>">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="lastName">Last Name</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="lastName" name="lastName" value="<?=$user->getLastName(); ?>">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="userName">Username</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="userName" name="userName" value="<?=$user->getUsername(); ?>">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="emailAddress">Email Address</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required, custom[email]]" id="emailAddress" name="email" value="<?=$user->getEmail(); ?>">
				</div>
			</div>
			
			<hr>
			
			<div class="control-group">
				<label class="control-label" for="jobTitle">Job Title</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="jobTitle" name="jobTitle" value="<?=$user->getJobTitle(); ?>">
				</div>
			</div>
			
			
			<div class="control-group">
				<label class="control-label" for="website">Website</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="website" name="website" value="<?=$user->getWebsite(); ?>">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="twitterHandle">Twitter Handle</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="twitterHandle" name="twitterHandle" value="<?=$user->getTwitterHandle(); ?>">
				</div>
			</div>
			
			<hr>
	
			<div class="control-group biography">
				<label class="control-label" for="textarea" for="biography">Biography</label>
				<div class="controls">
					<textarea class="input-xlarge" id="textarea" rows="3" id="biography" name="bio"><?=$user->getBio(); ?></textarea>
				</div>
			</div>
			
			<div class="form-actions" style="margin: 0;">
				<button type="submit" class="btn btn-primary" id="confirm">Save changes</button>
				<button type="reset" class="btn">Cancel</button>
			</div>
		</fieldset>
	  </form>
		
</div>