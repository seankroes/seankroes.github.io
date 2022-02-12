<?php include "admin-header.php" ?>

      <div id="adminHeader">
        <div class="adminWrapper">
        <p >You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a class="danger hvr-grow" href="admin.php?action=logout"?>Log out</a></p>
        </div>
      </div>
            <p><a class="btnblue hvr-grow" href="admin.php">Back</a></p>
         <div id="adminHeader">
         <div class="adminWrapper">
            <h1><?php echo $results['pageTitle']?></h1>

      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <div>

          <a>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['article']->title )?>" />
          </a>

          <!--<li>
            <label for="summary">Article Summary</label>
            <textarea name="summary" id="summary" placeholder="Brief description of the article" required maxlength="1000" style="height: 5em;"><?php //echo htmlspecialchars( $results['article']->summary )?></textarea>
          </li>-->

          <a>
            <!--<label for="content">Content</label>-->
            <textarea name="content" id="content" placeholder="" maxlength="100000" style="height: 10em;"><?php echo htmlspecialchars( $results['article']->content )?></textarea>
          </a>

          <a>
            <label for="publicationDate">Date</label>
            <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['article']->publicationDate ? date( "Y-m-d", $results['article']->publicationDate ) : "" ?>" />
          </a>
        </div>

        <div class="buttons">
          <input class="hvr-grow" type="submit" name="saveChanges" value="Save Changes" />
          <input class="hvr-grow" type="submit" formnovalidate name="cancel" value="Cancel" />
          <?php if ( $results['article']->id ) { ?>
      <p><a class="danger hvr-grow" href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>" onclick="return confirm('Delete This Article?')">Delete This Post</a></p>
<?php } ?>
        </div>

      </form>
    </div>
  </div>
<?php include "admin-footer.php" ?>

