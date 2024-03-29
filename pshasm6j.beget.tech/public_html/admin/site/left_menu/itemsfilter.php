<? include "site/items/func.php"; ?>
<style>
.input-group-sm {
	padding:5px 0 0 0;
}
</style>

<a href="<?=$hname?>admin/index.php" type="button" style="margin:0 0 20px 0" class="btn btn-sm btn-default btn-lg btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Назад</a>
<div class="text-center">
	<a href="<?=$hname?>admin/index.php?items&item_id=new" class="btn btn-success btn-sm" type="button"  title="Добавить работу"><span class="glyphicon glyphicon-plus"></span> Добавить работу</a>	
</div>	
<div class="input-group-sm">
	<span><a href="<?=$hname?>admin/index.php?items<?=$get?>&p=all"  class="btn btn-default btn-xs">Показать всё</a></span>
	<span><a href="<?=$hname?>admin/index.php?items<?=$get?>&p=1"  class="pull-right btn btn-default btn-xs">Постранично</a></span>
</div>
<div class="input-group input-group-sm">
	<input type="text" class="form-control" id="f_search" value="<?=$filters['f_search']?>" placeholder="Поиск">
	<span class="input-group-btn">
		<button class="btn btn-default" type="button" onclick="$('#f_search').val('');" title="Сбросить поиск"><span class="glyphicon glyphicon-remove"></span></button>
	</span>
</div>	
<div class="input-group-sm">
	<select id="f_author" class="form-control">
		<option value="0" <?=($filters['f_author']==0)?'selected="selected"':''?>>Все авторы</option>
		<? while ( $row = mysql_fetch_array($aut,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_author']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_type" class="form-control">
		<option value="0" <?=($filters['f_type']==0)?'selected="selected"':''?>>Все виды</option>
		<? while ( $row = mysql_fetch_array($typ,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_type']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_type2" class="form-control">
		<option value="0" <?=($filters['f_type2']==0)?'selected="selected"':''?>>Все типы</option>
		<? while ( $row = mysql_fetch_array($ty2,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_type2']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_tech" class="form-control">
		<option value="0" <?=($filters['f_tech']==0)?'selected="selected"':''?>>Все техники</option>
		<? while ( $row = mysql_fetch_array($tec,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_tech']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_period" class="form-control">
		<option value="0" <?=($filters['f_period']==0)?'selected="selected"':''?>>Любой период</option>
		<? while ( $row = mysql_fetch_array($per,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_period']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group input-group-sm">
	<span class="input-group-addon btn">Год</span>
	<input type="text" class="form-control" id="f_year_from" value="<?=$filters['f_year_from']?>">			
	<span class="input-group-addon btn">-</span>
	<input type="text" class="form-control" id="f_year_to" value="<?=$filters['f_year_to']?>">		
</div>
<div class="input-group input-group-sm">
	<span class="input-group-addon btn">Ш.</span>
	<input type="text" class="form-control" id="f_sizex_from" value="<?=$filters['f_sizex_from']?>">			
	<span class="input-group-addon btn">-</span>
	<input type="text" class="form-control" id="f_sizex_to" value="<?=$filters['f_sizex_to']?>">		
</div>
<div class="input-group input-group-sm">
	<span class="input-group-addon btn">В.</span>
	<input type="text" class="form-control" id="f_sizey_from" value="<?=$filters['f_sizey_from']?>">			
	<span class="input-group-addon btn">-</span>
	<input type="text" class="form-control" id="f_sizey_to" value="<?=$filters['f_sizey_to']?>">		
</div>
<div class="input-group-sm">
	<select id="f_genre" class="form-control">
		<option value="0" <?=($filters['f_genre']==0)?'selected="selected"':''?>>Все жанры</option>
		<? while ( $row = mysql_fetch_array($gen,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_genre']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_group" class="form-control">
		<option value="0" <?=($filters['f_group']==0)?'selected="selected"':''?>>Все тематические группы</option>
		<? while ( $row = mysql_fetch_array($gro,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_group']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_genre2" class="form-control">
		<option value="0" <?=($filters['f_genre2']==0)?'selected="selected"':''?>>Все жанры для сайта</option>
		<? while ( $row = mysql_fetch_array($ge2,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_genre2']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_seria" class="form-control">
		<option value="0" <?=($filters['f_seria']==0)?'selected="selected"':''?>>Все серии</option>
		<? while ( $row = mysql_fetch_array($ser,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_seria']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_depict" class="form-control">
		<option value="0" <?=($filters['f_depict']==0)?'selected="selected"':''?>>Что изображено</option>
		<? while ( $row = mysql_fetch_array($dep,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_depict']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group input-group-sm">
	<span class="input-group-addon btn" title="Размещаем на сайте">Статус:</span>
	<select id="f_status" class="form-control">
		<option value="0" <?=($filters['f_status']==2)?'selected="selected"':''?>>Показать все</option>
		<? while ( $row = mysql_fetch_array($sta,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_status']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group-sm">
	<select id="f_place" class="form-control">
		<option value="0" <?=($filters['f_place']==2)?'selected="selected"':''?>>Все места нахождения</option>
		<? while ( $row = mysql_fetch_array($pla,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_place']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
<div class="input-group input-group-sm">
	<span class="input-group-addon btn" title="Размещаем на сайте">На сайте:</span>
	<select id="f_public" class="form-control">
		<option value="2" <?=($filters['f_public']==2)?'selected="selected"':''?>>Показать все</option>
		<option value="1" <?=($filters['f_public']==1)?'selected="selected"':''?>>Да</option>
		<option value="0" <?=($filters['f_public']==0)?'selected="selected"':''?>>Нет</option>
	</select>
</div>
<div class="input-group input-group-sm">
	<span class="input-group-addon glyphicon glyphicon-sort" title="Сортировка"></span>
	<select id="f_order" class="form-control">
		<option value="1" <?=($filters['f_order']==1)?'selected="selected"':''?>>Сорт. по добавлению</option>
		<option value="2" <?=($filters['f_order']==2)?'selected="selected"':''?>>Сорт. по приоритету</option>
		<option value="5" <?=($filters['f_order']==5)?'selected="selected"':''?>>Сорт. по приоритету в избр.</option>
		<option value="3" <?=($filters['f_order']==3)?'selected="selected"':''?>>Сорт. по году</option>
		<option value="4" <?=($filters['f_order']==4)?'selected="selected"':''?>>Сорт. по году (обратно)</option>
	</select>
</div>	
<div class="input-group input-group-sm">
	<span class="input-group-addon btn" title="Размещаем на сайте">Избранное:</span>
	<select id="f_favorite" class="form-control">
		<option value="2" <?=($filters['f_favorite']==2)?'selected="selected"':''?>>Показать все</option>
		<option value="1" <?=($filters['f_favorite']==1)?'selected="selected"':''?>>Да</option>
		<option value="0" <?=($filters['f_favorite']==0)?'selected="selected"':''?>>Нет</option>
	</select>
</div>
<div class="input-group input-group-sm">
	<span class="input-group-addon btn">$</span>
	<input type="text" class="form-control" id="f_price_from" value="<?=$filters['f_price_from']?>">			
	<span class="input-group-addon btn">-</span>
	<input type="text" class="form-control" id="f_price_to" value="<?=$filters['f_price_to']?>">		
</div>
<div class="input-group-sm">
	<select id="f_extra" class="form-control">
		<option value="0" <?=($filters['f_extra']==0)?'selected="selected"':''?>>Все относительные признаки</option>
		<? while ( $row = mysql_fetch_array($ext,MYSQL_ASSOC) ) : ?>
		<option value="<?=$row['id']?>" <?=($filters['f_extra']==$row['id'])?'selected="selected"':''?>><?=$row['name_ru']?></option>
		<? endwhile; ?>
	</select>
</div>
	

<div style="padding:5px 0;text-align:right">
	<a href="<?=$hname?>admin/index.php?items" class="btn btn-default btn-sm pull-left" type="button"  title="Сбросить">Сбросить</a>	
	<a href="javascript:void(0)" class="btn btn-info btn-sm" type="button"  title="Применить" onclick="do_filter()">Применить</a>	
</div>	
<div style="padding:5px 0;text-align:right">
	<a href="javascript:void(0)" class="btn btn-warning btn-sm" type="button"  title="Применить" onclick="save_link()">Сохранить подборку</a>	
</div>		

<script>
	"use strict"

	function do_filter()
	{
		var get = ""; 
		get += "&f_order="+$("#f_order").val();
		if ($("#f_search").val().trim() != '')
			get += "&f_search="+$("#f_search").val().trim();

		if ($("#f_author").val() != 0)
			get += "&f_author="+$("#f_author").val();
		if ($("#f_type").val() != 0)
			get += "&f_type="+$("#f_type").val();
		if ($("#f_type2").val() != 0)
			get += "&f_type2="+$("#f_type2").val();
		if ($("#f_tech").val() != 0)
			get += "&f_tech="+$("#f_tech").val();
		if ($("#f_period").val() != 0)
			get += "&f_period="+$("#f_period").val();
		if ($("#f_genre").val() != 0)
			get += "&f_genre="+$("#f_genre").val();
		if ($("#f_group").val() != 0)
			get += "&f_group="+$("#f_group").val();
		if ($("#f_genre2").val() != 0)
			get += "&f_genre2="+$("#f_genre2").val();
		if ($("#f_seria").val() != 0)
			get += "&f_seria="+$("#f_seria").val();
		if ($("#f_depict").val() != 0)
			get += "&f_depict="+$("#f_depict").val();
		if ($("#f_public").val() != 2)
			get += "&f_public="+$("#f_public").val();
		if ($("#f_favorite").val() != 2)
			get += "&f_favorite="+$("#f_favorite").val();
		if ($("#f_status").val() != 0)
			get += "&f_status="+$("#f_status").val();
		if ($("#f_place").val() != 0)
			get += "&f_place="+$("#f_place").val();
		if ($("#f_extra").val() != 0)
			get += "&f_extra="+$("#f_extra").val();
		
		if ( ($("#f_year_from").val().trim() != '') && ($("#f_year_from").val().match('^[0-9]{4}$')) )
			get += "&f_year_from="+$("#f_year_from").val().trim();
		if ( ($("#f_year_to").val().trim() != '') && ($("#f_year_to").val().match('^[0-9]{4}$')) )
			get += "&f_year_to="+$("#f_year_to").val().trim();
		if ( ($("#f_sizex_from").val().trim() != '') && ($("#f_sizex_from").val().match('^[0-9]+$')) )
			get += "&f_sizex_from="+$("#f_sizex_from").val().trim();
		if ( ($("#f_sizex_to").val().trim() != '') && ($("#f_sizex_to").val().match('^[0-9]+$')) )
			get += "&f_sizex_to="+$("#f_sizex_to").val().trim();
		if ( ($("#f_sizey_from").val().trim() != '') && ($("#f_sizey_from").val().match('^[0-9]+$')) )
			get += "&f_sizey_from="+$("#f_sizey_from").val().trim();
		if ( ($("#f_sizey_to").val().trim() != '') && ($("#f_sizey_to").val().match('^[0-9]+$')) )
			get += "&f_sizey_to="+$("#f_sizey_to").val().trim();
		if ( ($("#f_price_from").val().trim() != '') && ($("#f_price_from").val().match('^[0-9]+$')) )
			get += "&f_price_from="+$("#f_price_from").val().trim();
		if ( ($("#f_price_to").val().trim() != '') && ($("#f_price_to").val().match('^[0-9]+$')) )
			get += "&f_price_to="+$("#f_price_to").val().trim();

		window.location.href = "<?=$hname?>admin/index.php?items" + get;
		return false;	
	}
	
	function save_link()
	{
		var n = prompt("Введите название для подборки:");
		if ( n ) {
			$.ajax(
			{
				async: false,
				type: "POST", 
				url: "<?=$hname?>" + "admin/_ajax.php?save_link",
				data: {link:'<?=$get?>', name: n},
				success: function(msg){
					alert("Подборка сохранена. Ссылку на нее вы можете получить в разделе 'Сохраненные подборки' "+msg);
				},
				error:  function(xhr, str)
				{
					alert('Возникла ошибка: ' + xhr.responseCode);
				}
			});		
		} else {
			alert("Нужно ввести название!");
		}
	}
</script>