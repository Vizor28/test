<?require 'header.php';?>


<?require 'bredcrambs.php';?>


<div class="container">
	<div class="row">
		<?foreach ($articles as $item){?>
		<div class="col-xs-12">
			<div class="h2"><a href="<?=$item["alias"]?>"><?=$item["title"]?></a></div>

		</div>
		<?}?>
	</div>
</div>



<?require 'footer.php';?>
