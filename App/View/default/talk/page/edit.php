<div class="well editaccount" style="margin-bottom: 0; padding-bottom: 0;">
		
	<form class="form-horizontal" style="margin-bottom: 0;" action="" method="post" id="talk-form">
		<fieldset>
			<legend>Create Your Talk</legend>
			<div class="control-group">
				<label class="control-label" for="talkTitle">Title</label>
				<div class="controls">
					<input type="text" class="input-xlarge validate[required]" id="talkTitle" name="talkTitle" value="<?=$helper->escape($talk->getTitle()); ?>">
					<span class="help-inline"></span>
				</div>
			</div>
			
			<?php if(count($talkDurations) == 1): ?>
			<input type="hidden" name="talkDuration" id="talkDuration" value="<?=$talk->getDuration(); ?>">
			<?php else: ?>
			<div class="control-group">
				<label class="control-label" for="talkDur<?=$talkDurations[0]; ?>">Duration (mins)</label>
				<div class="controls">
					<?php foreach($talkDurations as $val): ?>
					<label class="radio inline">
						<input type="radio" name="talkDuration" id="talkDur<?=$val; ?>" value="<?=$val; ?>" <?= $talk->getDuration() == $val ? 'checked' : ''; ?>><?=$val; ?>
					</label>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

			<div class="control-group">
				<label class="control-label" for="talkLevelBeginner">Level</label>
				<div class="controls">
					
					<?php foreach(array('Beginner', 'Intermediate', 'Advanced') as $val): ?>
					
					<label class="radio inline">
						<input type="radio" name="talkLevel" id="talkLevel<?=$val; ?>" value="<?=$val; ?>" <?= $talk->getLevel() == $val ? 'checked' : ''; ?>><?=$val; ?>
						<span class="help-inline"></span>
					</label>

					<?php endforeach; ?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="talkSlidesUrl">Slides Url</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="talkSlidesUrl" name="talkSlidesUrl" value="<?=$helper->escape($talk->getSlidesUrl()); ?>">
					<span rel="talkSlidesUrl" class="help-inline"></span>
				</div>
			</div>
			
			<hr>
			
			<div class="control-group">
				<label class="control-label" for="talkAbstract">Abstract</label>
				<div class="controls">
					<textarea class="input-xlarge validate[required]" id="talkAbstract" name="talkAbstract"><?=$helper->escape($talk->getAbstract()); ?></textarea>
					<span rel="talkSlidesUrl" class="help-inline"></span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="talkRemark">Remarks</label>
				<div class="controls">
					<textarea class="input-xlarge" id="talkRemark" name="talkRemark"><?=$helper->escape($talk->getRemark()); ?></textarea>
				</div>
			</div>
			
			<div class="form-actions" style="margin: 0;">
				<button type="submit" class="btn btn-primary" id="confirm">Save changes</button>
				<button type="reset" class="btn">Cancel</button>
			</div>
		</fieldset>
	  </form>
		
</div>