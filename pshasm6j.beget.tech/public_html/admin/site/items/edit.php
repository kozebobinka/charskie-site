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
<? include "site/items/func.php"; ?>
<? include "site/items/func_edit.php"; ?>
<? include "site/items/work.php"; ?>
<strong><?=(!$new)?"ID: {$work['id']}":''?></strong>
<small>(<?=(!$new)?"Добавлено: {$work['dt']}":''?>)</small>

<form enctype="multipart/form-data" id="form_item" type="submit" method="POST">
	<input type="hidden" name="cmd" id="cmd" value="<?=($new)?'add':'chg'?>">
	<input type="hidden" name="cmd_ex" id="cmd_ex" value="1">
	<input type="hidden" name="id" id="id" value="<?=$_GET['item_id']?>">
	<input type="hidden" name="techs" id="techs" value="<?=($new)?'':$work['tech']?>">
	<input type="hidden" name="depicts" id="depicts" value="<?=($new)?'':$work['depict']?>">
	<input type="hidden" name="genres" id="genres" value="<?=($new)?'':$work['genre']?>">
	<input type="hidden" id="files_a_del" name="files_a_del" value="0">
	<table class="table user-table">
		<tr>
			<th class="text-muted col-md-3">Изображение:<br>
				<a href="javascript:void(0)" class="btn btn-sm btn-default pull-left" onclick="delete_image()"><b>Удалить</b></a>
			</th>
			<td class="col-md-11">
				<input type="file" id="files" name="files[]"/>
				<span id="img">
					<? if ( !$new ) : ?>
					<a href="#" data-toggle="modal" data-target="#win_work"><img src="<?=$hname."works/origin/".$work["file"].'?'.time()?>" height="300"></a>
					<? endif; ?>
				</span>	
			</td>		
		</tr>
		<tr>
			<th class="text-muted">Автор</th>
			<td>
				<select id="author" name="author" class="form-control">
					<option value="0"></option>
					<? while ( $row = mysql_fetch_array($aut,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($work['author']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
			</td>
		</tr>
		<? foreach ($lang as $pr => $val) : ?>
		<tr>
			<th class="text-muted">Название (<?=$pr?>)</th>
			<td>
				<input type="text" id="name_<?=$pr?>" name="name_<?=$pr?>" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($work['name_'.$pr])?>" onchange="make_seo('<?=$pr?>')"> 
			</td>
		</tr>
		<? endforeach; ?>
		<tr>
			<th class="text-muted"><small>(для указания дробных значений ширины и высоты используйте точку как разделитель)</small></th>
			<td>
				<div>
					<span class="col-md-5" style="padding:0;">
						<div class="input-group input-group-sm">
							<span class="input-group-addon btn">Ширина, см</span>
							<input type="text" class="form-control" id="sizex" name="sizex" 
									value="<?=($new)?'':$work['sizex']?>">				
						</div>				
					</span>				
					<span class="col-md-5" style="padding:0;">
						<div class="input-group input-group-sm">
							<span class="input-group-addon btn">Высота, см</span>
							<input type="text" class="form-control" id="sizey" name="sizey" 
									value="<?=($new)?'':$work['sizey']?>">				
						</div>				
					</span>	
					<span class="col-md-2" style="padding:0;">&nbsp;
					</span>				
				</div>
				<div style="padding:20px">
				</div>
				<div>
					<span class="col-md-4" style="padding:0;">
						<div class="input-group input-group-sm">
							<span class="input-group-addon btn">Год</span>
							<input type="text" class="form-control" id="year" name="year" 
									value="<?=($new)?'':$work['year']?>">				
						</div>				
					</span>	
					<span class="col-md-1 text-center" style="padding:0;"></span>				
					<span class="col-md-5" style="padding:0;">
						<div class="input-group input-group-sm">
							<span class="input-group-addon btn">Период</span>
							<select id="period" name="period" class="form-control">
								<option value="0"></option>
								<? while ( $row = mysql_fetch_array($per,MYSQL_ASSOC) ) : ?>
								<option value="<?=$row['id']?>" <?=(!$new and ($work['period']==$row['id']))?'selected="selected"':''?>>
									<?=$row['name_ru']?>
								</option>
								<? endwhile; ?>
							</select>
						</div>				
					</span>	
					<span class="col-md-2" style="padding:0;">&nbsp;
					</span>				
				</div>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Вид</th>
			<td>
				<select id="type" name="type" class="form-control">
					<option value="0"></option>
					<? while ( $row = mysql_fetch_array($typ,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($work['type']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Тип</th>
			<td>
				<select id="type2" name="type2" class="form-control">
					<option value="0"></option>
					<? while ( $row = mysql_fetch_array($ty2,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($work['type2']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Жанр</th>
			<td>
				<span class="col-md-5" style="padding:0;">
				<select id="genre" name="genre" class="form-control" multiple size=10>
					<? $genre = explode(",", $work['genre']);?>
					<? while ( $row = mysql_fetch_array($gen,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and (array_search($row['id'], $genre) !== FALSE))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
				</span>
				<span  class="col-md-5">
				(Для выбора нескольких значений нажмите и удерживайте Ctrl и выбирайте нужные поля мышкой)
				</span>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Тематическая группа</th>
			<td>
				<select id="group" name="group" class="form-control">
					<option value="0"></option>
					<? while ( $row = mysql_fetch_array($gro,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($work['group']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Серия</th>
			<td>
				<select id="seria" name="seria" class="form-control">
					<option value="0"></option>
					<? while ( $row = mysql_fetch_array($ser,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($work['seria']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Техника</th>
			<td>
				<span class="col-md-5" style="padding:0;">
				<select id="tech" name="tech" class="form-control" multiple size=10>
					<? $techs = explode(",", $work['tech']);?>
					<? while ( $row = mysql_fetch_array($tec,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and (array_search($row['id'], $techs) !== FALSE))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
				</span>
				<span  class="col-md-5">
				(Для выбора нескольких значений нажмите и удерживайте Ctrl и выбирайте нужные поля мышкой)
				</span>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Что изображено</th>
			<td>
				<span class="col-md-5" style="padding:0;">
				<select id="depict" name="depict" class="form-control" multiple size=10>
					<? $depicts = explode(",", $work['depict']);?>
					<? while ( $row = mysql_fetch_array($dep,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and (array_search($row['id'], $depicts)) !== FALSE)?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
				</span>
				<span  class="col-md-5">
				(Для выбора нескольких значений нажмите и удерживайте Ctrl и выбирайте нужные поля мышкой)
				</span>
			</td>
		</tr>
		<? foreach ($lang as $pr => $val) : ?>
		<tr>
			<th class="text-muted">Описание (<?=$pr?>)</th>
			<td><textarea class="form-control" name="info_<?=$pr?>" id="info_<?=$pr?>" rows="4"><?=($new)?'':$work['info_'.$pr]?></textarea></td>
		</tr>
		<? endforeach; ?>
		<tr>
			<th class="text-muted">Статус</th>
			<td>
				<select id="status" name="status" class="form-control">
					<option value="0"></option>
					<? while ( $row = mysql_fetch_array($sta,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($work['status']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>	
				</select>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Местонахождение работы</th>
			<td>
				<select id="place" name="place" class="form-control">
					<option value="0"></option>
					<? while ( $row = mysql_fetch_array($pla,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($work['place']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th class="text-muted">Пояснение</th>
			<td>
				<input type="text" class="form-control" id="status_full" name="status_full" 
						value="<?=($new)?'':$work['status_full']?>">			
			</td>
		</tr>
		<tr>
			<th class="text-muted" colspan=2>
					<input type="checkbox" <?=(!$new and ($work['public']==1))?'checked="checked"':''?> id="public" name="public" />
					&nbsp;Публиковать в Работах
			</th>

		</tr>
		<tr>
			<th class="text-muted">
				<input type="checkbox" <?=(!$new and ($work['favorite']==1))?'checked="checked"':''?> id="favorite" name="favorite" />
				&nbsp;Публиковать в Избранном
			</th>
			<td>
				<span class="col-md-5" style="padding:0;">
					<div class="text-muted text-right"><b>Приоритет в Избранном&emsp;</b></div>
				</span>
				<span class="col-md-2" style="padding:0;">
					<input type="text" class="form-control" id="prior_fav" name="prior_fav" value="<?=($new)?$next_fav:$work['prior_fav']?>">	
				</span>
				<span class="col-md-2" style="padding:0;">
					<div class="text-muted text-right"><b>Приоритет в Работах&emsp;</b></div>
				</span>
				<span class="col-md-2" style="padding:0;">
					<input type="text" class="form-control" id="prior" name="prior" value="<?=($new)?$next:$work['prior']?>">	
				</span>
			</td>
		</tr>
		<tr>
			<th class="text-muted text-left">
				<div class="input-group input-group-sm">
					<span class="input-group-addon btn"><b>Цена, $</b></span>
					<input type="text" class="form-control" id="price" name="price" 
							value="<?=($new)?'':(($work['price']!=0)?$work['price']:'')?>">				
				</div>				
			</th>
			<td>
				<span class="col-md-8" style="padding:0;">
				<select id="extra" name="extra" class="form-control" style="padding:0;margin:0;">
					<option value="0">Относительный признак</option>
					<? while ( $row = mysql_fetch_array($ext,MYSQL_ASSOC) ) : ?>
					<option value="<?=$row['id']?>" <?=(!$new and ($work['extra']==$row['id']))?'selected="selected"':''?>>
						<?=$row['name_ru']?>
					</option>
					<? endwhile; ?>
				</select>
				</span>				
			</td>
		</tr>
		<? foreach ($lang as $pr => $val) : ?>
		<tr>
			<th class="text-muted">ЧПУ (<?=$pr?>)</th>
			<td>
				<input type="text" id="seo_<?=$pr?>" name="seo_<?=$pr?>" class="form-control" 
						value="<?=($new)?'':htmlspecialchars($work['seo_'.$pr])?>">
			</td>
		</tr>
		<? endforeach; ?>

		<tr>
			<th class="text-muted text-right" colspan="2">
				<a href="javascript:void(0)" class="btn btn-success" onclick="check_fields(1)"><b>Сохранить и выйти</b></a>
				<a href="javascript:void(0)" class="btn btn-success" style="width:200px" onclick="check_fields(2)"><b>Сохранить</b></a>
			</th>
		</tr>

		</table>

</form>
<script>
	var hname = '<?=$hname?>';
</script>
<script type="text/javascript" src="<?=$hname?>admin/site/items/func_edit.js"></script>
		


