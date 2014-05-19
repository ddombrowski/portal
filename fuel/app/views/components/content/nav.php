<div class='content-box' id='nav-bar'>
	<?php
	if(count($subPortals))
	{
		?>
	<ul class='links'>
    	<li class='vertical vertical-title'>Portals</li>
		<?php
        foreach($subPortals as $portal)
        {
            echo "<li class='vertical'>".(Html::anchor(Router::get($portal['uri']), $portal['name']))."</li>";
        }
        ?>
    </ul>
    	<?php
	}
	?>
    
    <?php
	if(count($subPages))
	{
		?>
	<ul class='links'>
    	<li class='vertical vertical-title'>Pages</li>
		<?php
        foreach($subPages as $page)
        {
            echo "<li class='vertical'>".(Html::anchor(Router::get($model->uri).'/'.$page['uri'], $page['name']))."</li>";
        }
        ?>
    </ul>
    	<?php
	}
	?>
</div>