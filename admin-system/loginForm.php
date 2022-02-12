<?php include "admin-header.php" ?>
  <div class="adminWrapper" style="text-align: center;">
      <form action="admin.php?action=login" method="post">
        <input type="hidden" name="login" value="true" />

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <div class="formlogin">

          <h1>Admin Login</h1>

          <a>
            <input class="inputlogin" type="text" name="username" id="username" placeholder="Username" required autofocus maxlength="20" autocorrect="off" autocapitalize="none" />
          </a>

          <a>
            <input class="inputlogin" type="password" name="password" id="password" placeholder="Password" required maxlength="20" autocorrect="off" autocapitalize="none" />
          </a>

        </div>

        <div class="buttons">
          <input class="hvr-grow login" type="submit" name="login" value="Login" />
        </div>

      </form>
      <p><a class="btnblue hvr-grow return" href="../blog.php">Return to blog</a></p>
    </div>

<?php include "admin-footer.php" ?>