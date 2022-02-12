<div class="article-container">
<?php foreach ( $results['articles'] as $article ) { ?>
				<div class="article">
				<span class="pubDate" style="float: right; margin: 1.5rem;"><?php echo date('j F Y', $article->publicationDate)?></span><a href="?action=viewArticle&amp;articleId=<?php echo $article->id?>"><h1><?php echo htmlspecialchars( $article->title )?></h1></a>
				<p><?php echo /*htmlspecialchars(*/ $article->content /*)*/?></p>
				</div>
<?php } ?>
</div>