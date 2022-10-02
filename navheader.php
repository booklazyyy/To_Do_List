        <div class="topnav">
            <?php if(@$_SESSION['id']==""){ ?>
                <a href="#" onclick="document.getElementById('id02').style.display='block'">Sign Up</a>
                <a href="#" onclick="document.getElementById('id01').style.display='block'">Sign in</a>
            <?php }else{ ?>
                    

                <a class="active" href="logout.php" onclick="return confirm('Are you sure to Logout?');">Log Out</a>
                <p href="#">Welcome:&nbsp;&nbsp;<?= $_SESSION['email'] ?> </p>
            <?php } ?>
        </div>

