<?php include "templates/include/header.php" ?>

      <h1>Post Archive</h1>

      <div id="headlines" class="archive">

<?php foreach ( $results['articles'] as $article ) { ?>

        <a>
          <h2>
            <span class="pubDate"><?php echo date('j F Y', $article->publicationDate)?></span><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
          </h2>
          <p class="summary"><?php echo htmlspecialchars( $article->content )?></p>
        </a>

<?php } ?>

      </div>

      <p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
      
      <p><a class="btnblue hvr-grow" href="./admin.php">Return to admin</a></p>

<?php include "templates/include/footer.php" ?>

