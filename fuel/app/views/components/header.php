<div id='header-wrapper'>
    <div id='nav-bar-container' class='toolbar'>
    	<div class='wrapper-1000px'>
        	<center>
        	<ul class='links'>
            	<li style='float:none;'><h1><a href='/'><img src='/assets/img/logo.png' height="100px" /></a></h1></li>
        	</ul>
            </center>
        </div>
    </div>
    <div class='toolbar' id='top-level-nav'>
    	<div class='wrapper-1000px'>
        	<ul class='links'>
				<?php
                foreach($topLevelChildren as $child)
                {
                    echo "<li>".(Html::anchor(Router::get($child['uri']), $child['name']))."</li>";	
                }
                ?>
            </ul>
        </div>
    </div>
</div>