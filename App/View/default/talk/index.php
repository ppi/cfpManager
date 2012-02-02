<div class="span10">
	<h1>Create an Account</h1>
	<div class="alert-message block-message info">Please complete the form below to create your account</div>
	<form id="register" method="post" action="" class="form-stacked">
	<fieldset>
		<legend><img src="<?=$baseUrl;?>images/user.png" /> Personal Details</legend>
		<div class="clearfix">
			<label for="title">Title:</label>
			<div class="input">
				<input class="span5 validate[required,minSize[2],maxSize[15]]" type="text" name="title" id="title" placeholder="Title" value="" />
				<span rel="title" class="help-inline"></span>
			</div>
		</div>
		<div class="clearfix">
			<label for="firstName">First Name:</label>
			<div class="input">
				<input class="span5 validate[required,minSize[2],maxSize[30]]" type="text" name="firstName" id="firstName" placeholder="First Name" value="" />
				<span rel="firstName" class="help-inline"></span>
			</div>
		</div>
		<div class="clearfix">
			<label for="lastName">Last Name:</label>
			<div class="input">
				<input class="span5 validate[required,minSize[2],maxSize[40]]" type="text" name="lastName" id="lastName" placeholder="Last Name" value="" />
				<span rel="lastName" class="help-inline"></span>
			</div>
		</div>
		<div class="clearfix">
			<label for="email">Email Address:</label>
			<div class="input">
				<input class="span5 validate[required,custom[email]]" type="text" name="email" id="email" placeholder="Email Address" value="" />
				<span rel="email" class="help-inline"></span>
			</div>
		</div>
		<div class="clearfix">
			<label for="telephone">Telephone Number:</label>
			<div class="input">
				<input class="span5 validate[required,custom[phone]]" type="text" name="telephone" id="telephone" placeholder="Telephone Number" value="" />
				<span rel="telephone" class="help-inline"></span>
			</div>
		</div>
		<div class="clearfix">
			<label for="mobile">Mobile Number:</label>
			<div class="input">
				<input class="span5 validate[custom[phone]]" type="text" name="mobile" id="mobile" placeholder="Mobile Number" value="" />
				<span rel="mobile" class="help-inline"></span>
			</div>
		</div>
	</fieldset>
</div>