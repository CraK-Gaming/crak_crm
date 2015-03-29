<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

		Matches
		
		<?php if ($this->matches) { ?>
            <table border='1' width='100%'>
                <thead>
                <tr>
                    <td>Title</td>
					<td>Date</td>
					<td>Tournament</td>
					<td>Score</td>
					<td>Status</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->matches as $match) { ?>
                        <tr>
							<td><a href="<?= Config::get('URL') . 'Admin/EditMatch/' . $match->match_id; ?>"><?= $match->team_name; ?> vs <?= $match->opponent_name; ?></a></td>
							<td><?= $match->match_date; ?></td>
							<td><?= $match->tournament_name; ?></td>
							<td><?= $match->score; ?></td>
							<td><?= $match->match_status_name; ?></td>
                            <td> 
								<a href="<?= Config::get('URL') . 'Admin/DeleteMatch/' . $match->match_id; ?>">Delete</a>
							</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No Games Yet</div>
            <?php } ?>
    </div>
</div>
