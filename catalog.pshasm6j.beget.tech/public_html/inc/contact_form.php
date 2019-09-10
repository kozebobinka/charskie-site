<div class="row row-fluid text-center hidden-form">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="row row-fluid">
			<div class="col-sm-12">
				<form>
					<div class="wpcf7-form-control-wrap name">
						<input type="text" name="name" value="" size="40" class="wpcf7-form-control" placeholder="<?=$contact_name?>:"/>
					</div>
					<div class="wpcf7-form-control-wrap phone">
						<input type="phone" name="phone" value="" size="40" class="wpcf7-form-control" placeholder="<?=$contact_phone?>:"/>
					</div>
					<div class="wpcf7-form-control-wrap email">
						<input type="email" name="email" value="" size="40" class="wpcf7-form-control" placeholder="<?=$contact_email?>:"/>
					</div>
					<div class="wpcf7-form-control-wrap message">
						<textarea name="message" cols="40" rows="10" class="wpcf7-form-control" placeholder="<?=$contact_question?>"></textarea>
					</div>
					<div class="rules-my">
						<p><?=$contact_disclaimer1?></p>
                        <p><?=$contact_disclaimer2?> <a target="_blank" href="<?=str_replace('catalog.', '', $site_url).$lg?>/gdpr" target="_blanc"><?=$contact_rules?></a><?=$contact_disclaimer3?></p>
                    </div>
					<div class="wpcf7-form-control-wrap">
						<input type="submit" value="Отправить" class="wpcf7-form-control wpcf7-submit"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>