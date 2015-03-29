<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

		<h1>Edit Game</h1>
		
        <?php if ($this->game) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>admin/editGameSave">
			
                <input type="hidden" name="game_id" value="<?php echo htmlentities($this->game->game_id); ?>" />
                
				Name: <input type="text" name="game_name" value="<?php echo htmlentities($this->game->name); ?>" /><br /><br />
				
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This game does not exist.</p>
        <?php } ?>
    </div>
</div>
