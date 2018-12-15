<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>New Post</title>
        <link rel="stylesheet" type="text/css" href="<?= url('/public/css','styles.css'); ?>">
    </head>
    <body>
    	<div class="container">
	    	<h1>
	    		<a href="<?= url('/', null) ?>" class="header-menu">Back</a>
	    		New post
	    	</h1>
    		<form method="post" action="<?= url('/posts',null); ?>">
    			<p>
    				<input type="text" name="title" placeholder="enter title">
    			</p>
    			<p>
    				<textarea name="body" placeholder="enter body"></textarea>
    			</p>
    			<p>
    				<input type="submit" value="Add">
    			</p>
    		</form>
    	</div>
    </body>
</html>