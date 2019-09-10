<div class="paginate">
	<div class="paginate_links">
		<? if ( ($page == 1) or ($page == 'all') ) : ?>
		<span class='page-numbers-my'><i class="fa fa-angle-left"></i></span>
		<? else : ?>
		<a class='page-numbers-my page-numbers-my-a' href="<?=$site_url.$_GET['patch']."?$get&page=".($page-1)?>"><i class="fa fa-angle-left"></i></a>
		<? endif; ?>	
		<? if ($dots1 == 1) : ?>
		<a class='page-numbers-my page-numbers-my-a' href="<?=$site_url.$_GET['patch']?>?<?=$get?>&page=1">1</a>
		<a class='page-numbers-my page-numbers-my-a' href="<?=$site_url.$_GET['patch']?>?<?=$get?>&page=<?=$eight*8?>">...</a>
		<? endif; ?>	
		<? for ($i = $pstart; $i <= $pend; $i++) : ?>
		<? if ( $page == $i ) : ?>
		<span class='page-numbers-my current'><?=$i?></span>
		<? else : ?>
		<a class='page-numbers-my page-numbers-my-a' href="<?=$site_url.$_GET['patch']."?$get&page=".$i?>"><?=$i?></a>
		<? endif; ?>	
		<? endfor; ?>
		<? if ($dots2 == 1) : ?>
		<a class='page-numbers-my page-numbers-my-a' href="<?=$site_url.$_GET['patch']?>?<?=$get?>&page=<?=$eight*8+9?>">...</a>
		<a class='page-numbers-my page-numbers-my-a' href="<?=$site_url.$_GET['patch']?>?<?=$get?>&page=<?=$pages?>"><?=$pages?></a>
		<? endif; ?>	
		<? if ( ($page == $pages) or ($page == 'all') ) : ?>
		<span class='page-numbers-my'><i class="fa fa-angle-right"></i></span>
		<? else : ?>
		<a class='page-numbers-my page-numbers-my-a' href="<?=$site_url.$_GET['patch']."?$get&page=".($page+1)?>"><i class="fa fa-angle-right"></i></a>
		<? endif; ?>
		<? if ( $page == 'all' ) : ?>
		<span class='page-numbers-my'><?=$show_all_works?></span>
		<? else : ?>
		<a class='page-numbers-my page-numbers-my-a' href="<?=$site_url.$_GET['patch']."$get&all"?>"><?=$show_all_works?></a>
		<? endif; ?>
	</div>
</div>