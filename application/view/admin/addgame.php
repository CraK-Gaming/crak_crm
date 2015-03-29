<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

		<h1>Add Game</h1>
       
		<form method="post" action="<?php echo Config::get('URL'); ?>admin/addGameSave">
		
			Name: <input type="text" name="game_name" value="" /><br /><br />
			
			<input type="submit" value='Change' />
		</form>
       
    </div>
</div>
