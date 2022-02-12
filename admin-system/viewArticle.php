<div class="article-container">
<h1><?php echo htmlspecialchars( $results['article']->title )?></h1>
<!--<div style="width: 75%; font-style: italic;"><?php //echo htmlspecialchars( $results['article']->summary )?></div>-->
<div class="summary view" style="margin-bottom: 5%;"><?php echo $results['article']->content?></div>
<p class="pubDate">Published on <?php echo date('j F Y', $results['article']->publicationDate)?></p>

<!--Buttons-->
<p><a class="btnblue hvr-grow" href="./blog.php" style="margin-left: 5%;">Return to blog</a></p>

<br />
<hr>
<!--Show/Hide reply section-->
<script>function showhide() {
        var x = document.getElementById("showhide");
        var y = document.getElementById("opencomments");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.value = "Close replies";
        } else {
            x.style.display = "none";
            y.value = "Leave a reply";
        }
    }</script>
<!--<br>-->
<div class="opencommentswrapper">
    <input type="submit" id="opencomments" class="opencomments" onclick="showhide()" value="Leave a reply" />
</div>

<div class="formtext" id="showhide" style="display:none;">
    <form action="#comment" method="POST">
        <input type="text" name="name" maxlength="25" placeholder="Name" required>
        <p></p>
        <textarea type="text" name="comment"  cols="30" rows="10" maxlength="600" placeholder="Leave a message" required></textarea>

        <!--Show words left for reply, span is where its shown-->
        <span></span>
        <script>
            $('textarea').keyup(function(){

                if(this.value.length > $(this).attr('maxlength')){
                    return false;
                }
                $(this).next().html("Remaining characters : " +($(this).attr('maxlength') - this.value.length));

            });
        </script>


        <p></p>

        <?php
        //init captcha variables
        $min_number = 0;
        $max_number = 5;
        $random_number1 = mt_rand($min_number, $max_number);
        $random_number2 = mt_rand($min_number, $max_number);
        ?>
        <?php

        //captcha form
        echo $random_number1 . ' + ' . $random_number2 . ' = ';
        ?>
        <input type="number" style="margin-top: 0%;" name="captchaResult" class="captchaResult" type="text" size="2" placeholder="?" required>
        <input name="firstNumber" type="hidden" value="<?php echo $random_number1; ?>" />
        <input name="secondNumber" type="hidden" value="<?php echo $random_number2; ?>" />
        <p class="antispam" style="display:none;"><input type="text" name="antispam" /></p>
        <p></p>
        <input type="submit" value="Reply" name="submitcomment" />
    </form>
</div>
<div class="error">
    <?php
    if(isset($_POST["submitcomment"])) {
        if(isset($_POST['antispam']) && $_POST['antispam'] == ''){
            if(!empty($_POST['name']) && !empty($_POST['comment'])) {


                //check captcha if the answer is valid
                $captchaResult = $_POST["captchaResult"];
                $firstNumber = $_POST["firstNumber"];
                $secondNumber = $_POST["secondNumber"];
                $checkTotal = $firstNumber + $secondNumber;

                if ($captchaResult == $checkTotal) {

                    //retrieve article ID
                    $articleID = $results['article']->id;

                    //retrieve ip address
                    $ip = $_SERVER['REMOTE_ADDR'];

                    //connect with database
                    include "connect_comments.php";

                    //store users in variables
                    $name=mysqli_real_escape_string($con,$_POST['name']);
                    $comment=mysqli_real_escape_string($con,$_POST['comment']);

                    $date = date("Y-m-d H:i:s");

                    $query=mysqli_query($con,"SELECT * FROM comments WHERE name='".$name."'");
//                  $numrows=mysqli_num_rows($query);
//                    if($numrows==0)
//                    {
                        $sql="INSERT INTO comments(name,comment,date,articleID,ip) VALUES('$name','$comment','$date','$articleID','$ip')";
                        $result = mysqli_query($con,$sql);
                        if($result){
                            //echo "Entry successfully added.";
                            //Jump to the comment
                            echo "<a name=\"comment\"></a> ";
                            //Makes page refresh
                            //echo "<meta http-equiv='refresh' content='0'>";
                        } else {
                            echo '<div class="errorMessage">Please contact us to resolve this issue..</div>';
                            //Jump to the comment
                            echo "<a name=\"comment\"></a> ";
                        }
//                    } else {
//                        //echo "You replied with that name already exists. Please try again.";
//                        echo '<div class="errorMessage">A reply with that name already exists. Please try again.</div>';
//                        //Jump to the comment
//                        echo "<a name=\"comment\"></a> ";
//                    }
                } else {
                    //echo "Wrong captcha. Please try again.";
                    echo '<div class="errorMessage">Wrong captcha. Please try again.</div>';
                    //Jump to the comment
                    echo "<a name=\"comment\"></a> ";
                }
            } else {
                //echo "Please fill out all the fields.";
                echo '<div class="errorMessage">Please fill out all the fields.</div>';
                //Jump to the comment
                echo "<a name=\"comment\"></a> ";
            }
        }else {
            //echo "Spam detected.";
            echo '<div class="errorMessage">Spam detected.</div>';
            //Jump to the comment
            echo "<a name=\"comment\"></a> ";
        }
    }
    ?>
</div>

<div class="formtext">

    <!--Show Comments-->
    <?php
    $articleID = $results['article']->id;

    //connect with database
    include "connect_comments.php";
    $sql = "SELECT * FROM comments WHERE articleID = '$articleID' ORDER BY date DESC";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            //Jump to the comment
            echo "<a name=\"comment\"></a> ";
            echo "<hr>" . "<strong>" . htmlspecialchars($row["name"]) . "</strong> <div>" . htmlspecialchars($row["date"]) .  "</div> <br>" . "" . htmlspecialchars($row["comment"]) . "<br>";
            //like button
            //<p><a class="btnblue hvr-grow" name="like" value="like">Like</a></p>

        }
    } else {
        echo "<h3>There are no replies yet.</h3>";
    }

    //like system
    //if($_POST['like']) {
    //	include "connect_comments.php";
    //	$sql = "UPDATE comments SET likes = 'likes+1' WHERE id='$id'";
    //	$result = mysqli_query($con, $sql);
    //}
    ?>
</div>
</div>