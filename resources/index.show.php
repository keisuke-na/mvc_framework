<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Blog Posts</title>
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','styles.css'); ?>">
    </head>
    <body>
    	<div class="container">
    		<h1>
               <a href="<?= url('/post/create', null); ?>" class="header-menu">New Post</a> 
                Blog Posts
            </h1>
    		<ul>
            <?php if($datas): ?>
    			<?php foreach($datas as $data): ?>
                  <li><a href="<?= "post/{$data->id}" ?>"><?= $data->title ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Not posts yet</li>
            <?php endif ?>
    		</ul>
    	</div>
    </body>
</html>