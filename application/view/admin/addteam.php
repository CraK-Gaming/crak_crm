<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

		<h1>Add Team</h1>
       
		<form method="post" action="<?php echo Config::get('URL'); ?>admin/addTeamSave">
		
			Name: <input type="text" name="team_name" value="" /><br /><br />
			
			Game: 
				<select name="game_id">
					 <?php foreach($this->games as $game) { ?>
						<option value="<?= $game->game_id; ?>">
							<?= $game->name; ?>
						</option>
					 <?php } ?>
				</select>
			
			<input type="submit" value='Change' />
		</form>
       
    </div>
</div>
