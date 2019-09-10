<style>
    .user-panel 
	{
		height: 1040px;
		padding: 10px 5px 5px 5px;
	}
    .user-panel3 
	{
		padding: 0 0 0 0;
	}
    .user-panel2 
	{
		padding: 0 0 0 20px;
	}
</style>

<div style="filter:alpha(opacity=65); opacity: 0.65;background:#ecf5fc;width:100%; height: 100%; position: fixed; display:none;text-align:center;z-index:3;" id="loading">
</div>	

<div class="panel panel-primary">
	<div class="panel-heading user-panel2">
		<div class="row user-panel2">
			<div class="col-md-10 user-panel2">
				<h4>Панель администратора</h4>
			</div>
			<div class="col-md-1">
				<form method="POST">
				<input name="logout" value="1" type="hidden">
				<button class="btn btn-default btn-sm" type="submit" style="margin:4px">Выход</button>
				</form>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-2 panel panel-default user-panel well">
			<? 
				if ( isset($_GET['catalog']) or isset($_GET['property']) )
					include "left_menu/catalog.php";
				elseif ( isset($_GET['allsettings']) or isset($_GET['settings']) 
					  or isset($_GET['langs']) or isset($_GET['bkp']) )
					include "left_menu/allsettings.php";
				elseif ( isset($_GET['item_id']) )
					include "left_menu/edit_item.php";
				elseif ( isset($_GET['article_id']) )
					include "left_menu/edit_article.php";
				elseif ( isset($_GET['items']) )
					include "left_menu/itemsfilter.php";
				elseif ( isset($_GET['articles']) )
					include "left_menu/articles.php";
				elseif ( isset($_GET['translations']) )
					include "left_menu/translations.php";
				else
					include "left_menu/index.php"; 	
			?>
			</div>
			<div class="col-md-10 panel panel-default user-panel3 ">
			<?
				if ( isset($_GET['settings']) )
					include "settings/index.php";
				elseif ( isset($_GET['langs']) )
					include "langs/index.php";
				elseif ( isset($_GET['bkp']) )
					include "bkp/index.php";
				elseif ( isset($_GET['property']) )
					include "properties/index.php";
				elseif ( isset($_GET['item_id']) )
					include "items/edit.php";
				elseif ( isset($_GET['article_id']) )
					include "articles/edit.php";
				elseif ( isset($_GET['items']) )
					include "items/index.php";
				elseif ( isset($_GET['articles']) )
					include "articles/index.php";
				elseif ( isset($_GET['translations']) )
					include "translate/index.php";
				elseif ( isset($_GET['links']) )
					include "links/index.php";
			?>			
			</div>
		</div>      
	</div>
</div>



