<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?= db('title') ?></title>
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','styles.css'); ?>">
    </head>
    <body>
    	<div class="container">
    		<h1>
               <a href="<?= url('/', null) ?>" class="header-menu">Back</a> 
    			<?= db('title') ?>
    		</h1>
    		<ul>
            <?php if($datas): ?>
            	<li><?= db('body') ?></li>
            <?php else: ?>
                <li>Not posts yet</li>
            <?php endif ?>
    		</ul>
    	</div>
    </body>
</html>