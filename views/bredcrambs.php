<?if(!empty($bredcrambs)){?>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">


                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <?foreach ($bredcrambs as $item){?>

                        <li><a href="/<?=$item["alias"]?>/"><?=$item["name"]?></a></li>

                    <?}?>

                </ol>


            </div>
        </div>
    </div>



<?}?>
