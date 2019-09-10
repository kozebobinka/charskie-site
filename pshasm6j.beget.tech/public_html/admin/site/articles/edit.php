<style>
.user-table {
	width: 900px;
}
.thumb {
	height: 300px;
}
.star {
	color:red;
}
.cls_error_win {
	background:#DD5F4D;
	padding:5px 5px 5px 5px;
	position: absolute; 
	display:none;
	color:#fff;
	font-weight:bold;
	line-height:17px;
	z-index:1000;
	right:9px 0px;
}
</style>
<? include "site/articles/func.php"; ?>
<? include "site/articles/func_edit.php"; ?>
<? include "site/articles/work.php"; ?>

<form enctype="multipart/form-data" id="form_article" type="submit" method="POST">
	<input type="hidden" name="cmd" id="cmd" value="<?=($new)?'add':'chg'?>">
	<input type="hidden" name="cmd_ex" id="cmd_ex" value="1">
	<input type="hidden" name="id" id="id" value="<?=$_GET['article_id']?>">
	<input type="hidden" name="techs" id="techs" value="<?=($new)?'':$article['tech']?>">
	<input type="hidden" name="depicts" id="depicts" value="<?=($new)?'':$article['depict']?>">
	<input type="hidden" id="files_a_del" name="files_a_del" value="0">
	<table class="table user-table">
		<tr>
			<th class="text-muted col-md-3">Тип статьи<span class="star"> *</span></th>
			<td>
				<select id="type" name="type" class="form-control">
					<option value="publications" <?=(!$new and ($article['type']=='publications'))?'selected="selected"':''?>>Публикация</option>
					<option value="expositions" <?=(!$new and ($article['type']=='expositions'))?'selected="selected"':''?>>Выставка</option>
					<option value="memories" <?=(!$new and ($article['type']=='memories'))?'selected="selected"':''?>>Воспоминание</option>
				</select>
			</td>
		</tr>	
		<tr>
			<th class="text-muted">Художник<span class="star"> *</span></th>
			<td>
				<select id="about" name="about" class="form-control">
					<? while ( $row = mysql_fetch_array($aut,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($article['about']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Дата добавления</th>
			<td>
				<input type='text' id="date_add" name="date_add" class="form-control datetimepicker" 
					   value="<?=($new)?date("Y-m-d"):htmlspecialchars($article['date_add'])?>">
			</td>
		</tr>
		<tr>
			<th class="text-muted">Дата события</th>
			<td>
				<input type='text' id="date_event" name="date_event" class="form-control datetimepicker" 
					   value="<?=($new)?'':htmlspecialchars($article['date_event'])?>">
			</td>
		</tr>
		<tr>
			<th class="text-muted">Год события</th>
			<td>
				<input type='text' id="year_event" name="year_event" class="form-control" 
					   value="<?=($new)?'':htmlspecialchars($article['year_event'])?>">
			</td>
		</tr>
		<tr>
			<th class="text-muted">
				Изображение:<br>
				<a href="javascript:void(0)" class="btn btn-sm btn-default pull-left" onclick="delete_image()"><b>Удалить</b></a>
			</th>
			<td>
				<input type="file" id="files_a" name="files_a[]">
				<span id="img">
					<? if ( !$new ) : ?>
					<a href="#" data-toggle="modal" data-target="#win_work"><img src="<?=$hname."images/articles/origin/".$article["file"].'?'.time()?>" height="300"></a>
					<? endif; ?>
				</span>	
			</td>		
		</tr>

		<? foreach ($lang as $pr => $val) : ?>
		<tr style="background:lightgrey">
			<th></th>
			<td></td>
		</tr>
		<tr>
			<th class="text-muted">Название (<?=$pr?>)</th>
			<td>
				<input type="text" id="name_<?=$pr?>" name="name_<?=$pr?>" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($article['name_'.$pr])?>"  onchange="make_seo('<?=$pr?>')">
			</td>
		</tr>
		<tr>
			<th class="text-muted">Заход (<?=$pr?>)</th>
			<td><textarea class="form-control summernote" name="short_text_<?=$pr?>" id="short_text_<?=$pr?>" rows="4"><?=($new)?'':$article['short_text_'.$pr]?></textarea></td>
		</tr>
		<tr>
			<th class="text-muted">Полный текст (<?=$pr?>) - ссылка</th>
			<td>
				<input type="text" id="text_<?=$pr?>" name="text_<?=$pr?>" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($article['text_'.$pr])?>">
			</td>
		</tr>
		<tr>
			<th class="text-muted">Страна, город (<?=$pr?>)</th>
			<td>
				<input type="text" id="country_<?=$pr?>" name="country_<?=$pr?>" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($article['country_'.$pr])?>">
			</td>
		</tr>
		<tr>
			<th class="text-muted">Автор (<?=$pr?>)</th>
			<td>
				<input type="text" id="author_<?=$pr?>" name="author_<?=$pr?>" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($article['author_'.$pr])?>">
			</td>
		</tr>
		<tr>
			<th class="text-muted">Издание (<?=$pr?>)</th>
			<td>
				<input type="text" id="issue_<?=$pr?>" name="issue_<?=$pr?>" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($article['issue_'.$pr])?>">
			</td>
		</tr>
		<? if ($pr=='ru') : ?>
		<tr>
			<th class="text-muted">Номер издания (общий)</th>
			<td>
				<input type="text" id="issue_n" name="issue_n" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($article['issue_n'])?>">
			</td>
		</tr>
		<? endif; ?>
		<? endforeach; ?>
		<tr style="background:lightgrey">
			<th></th>
			<td></td>
		</tr>
		
		<tr>
			<th class="text-muted">Приоритет</th>
			<td>
				<input type='text' id="prior" name="prior" class="form-control" 
					   value="<?=($new)?$next:htmlspecialchars($article['prior'])?>">
			</td>
		</tr>		<tr>
			<th class="text-muted">
				<input type="checkbox" <?=(!$new and ($article['public']==1))?'checked="checked"':''?> id="public" name="public" />
				&nbsp;Публиковать на сайте
			</th>
			<td>
			</td>
		</tr>
		<? foreach ($lang as $pr => $val) : ?>
		<tr>
			<th class="text-muted">ЧПУ (<?=$pr?>)</th>
			<td>
				<input type="text" id="seo_<?=$pr?>" name="seo_<?=$pr?>" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($article['seo_'.$pr])?>">
			</td>
		</tr>
		<? endforeach; ?>
		<tr>
			<th class="text-muted text-right" colspan="2">
				<a href="javascript:void(0)" class="btn btn-warning pull-left" onclick="delete_article()"><b>Удалить</b></a>
				<a href="javascript:void(0)" class="btn btn-success" style="width:200px" onclick="check_fields(1)"><b>Сохранить и выйти</b></a>
				<a href="javascript:void(0)" class="btn btn-success" style="width:200px" onclick="check_fields(2)"><b>Сохранить</b></a>
			</th>
		</tr>

		</table>

</form>
<script>
	var hname = '<?=$hname?>';
</script>
<script type="text/javascript" src="<?=$hname?>admin/site/articles/func_edit.js"></script>
		


