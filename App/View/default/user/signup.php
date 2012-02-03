<div class="span10" id="user-signup-page">
	<h1>Create an Account</h1>
	<div class="alert alert-info">Please complete the form below to create your account</div>
	<form id="user-form" method="post" action="" class="form-stacked well">
		<fieldset>
			<legend><img src="<?=$baseUrl;?>images/user/user.png" /> Personal Details</legend>
			<div class="clearfix">
				<div class="input">
					<input class="span5 validate[required]" type="text" name="userName" id="userName" placeholder="Username" value="" />
					<span rel="firstName" class="help-inline"></span>
				</div>
			</div>
			<div class="clearfix">
				<div class="input">
					<input class="span5 validate[required]" type="text" name="firstName" id="firstName" placeholder="First Name" value="" />
					<span rel="firstName" class="help-inline"></span>
				</div>
			</div>
			<div class="clearfix">
				<div class="input">
					<input class="span5 validate[required]" type="text" name="lastName" id="lastName" placeholder="Last Name" value="" />
					<span rel="lastName" class="help-inline"></span>
				</div>
			</div>
			<div class="clearfix">
				<div class="input">
					<input class="span5 validate[required,custom[email]]" type="text" name="email" id="email" placeholder="Email Address" value="" />
					<span rel="email" class="help-inline"></span>
				</div>
			</div>
		</fieldset>
			
		<hr>
			
		<fieldset>
			<legend><img src="<?=$baseUrl;?>images/user/password.png">Password</legend>
			<div class="clearfix ">
				<div class="input">
					<input class="span5 validate[required,minSize[5]]" onblur="validateConfirmation();" type="password" name="password" id="password" placeholder="Password">
					<span rel="password" class="help-inline"></span>
				</div>
			</div>
			<div class="clearfix ">
				<div class="input">
					<input class="span5 validate[required,equals[password]]" type="password" name="confirm" id="confirm" placeholder="Confirm Password">
					<span rel="confirm" class="help-inline"></span>
				</div>
			</div>
		</fieldset>
		
		<hr>
		
		<input class="btn btn-primary" type="submit" value="Register">
	
	</form>
		
</div>