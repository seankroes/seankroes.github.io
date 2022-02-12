<?php include "admin-header.php" ?>
<h1>Admin Panel</h1>
<?php include "admin-footer.php" ?>
      <div id="adminHeader" style="text-align:center;margin: 10rem auto;">
        <div class="adminWrapper">
            <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a class="danger hvr-grow" href="admin.php?action=logout"?>Log out</a></p>
	  <p><a class="btnblue hvr-grow" href="comments-remove.php">View or remove comments</a></p>
      <p><a class="btnblue hvr-grow" href="admin.php?action=newArticle">Create a new blog post</a></p>
      <p><a class="btnblue hvr-grow" href="../blog.php">Return to blog page</a></p>
	  	  <p>There are <?php echo $results['totalRows']?> blog post<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
      <p>Click on a post below to edit it.</p>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>

      <table style="margin: 3rem auto;">
        <tr class="tablehead">
          <th>Publication Date</th>
          <th>Post Title</th>
        </tr>

<?php foreach ( $results['articles'] as $article ) { ?>

        <tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id?>'">
          <td><?php echo date('j M Y', $article->publicationDate)?></td>
          <td>
            <?php echo $article->title?>
          </td>
        </tr>

<?php } ?>

      </table>
      <!--<p><a class="btnblue" href="./?action=archive">Archive</a></p>-->
    </div>
  </div>