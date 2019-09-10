<? if (!$new) : ?>
<div class="modal fade" id="win_work" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header"><button class="close" type="button" data-dismiss="modal">x</button>
				<h4 class="modal-title" id="myModalLabel"><?=$work['name_ru']?></h4>
          </div>
			<div class="modal-body">
			<div class="text-center">
				<img  style="max-height:800px;max-width:870px" src="<?=$hname."works/origin/".$work["file"].'?'.time()?>">
			</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button>
			</div>
		</div>
	</div>
</div>
<? endif; ?>