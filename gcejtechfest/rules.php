<!DOCTYPE html>
<body>
<?php
    include('header.php');
?>
<div class="container" style="margin-top:60px;margin-bottom:30px;">
     <style>
    /* only small desktops */
@media screen and (min-width: 800px) {
   .aboutgcoej {
        
            padding-left:40px;
            padding-right:40px;
        }
    .developers{
        padding-left:300px;
    }
}  
@media (max-width: 767px){
        .aboutgcoej {
        
            padding-left:5px;
            padding-right:5px;
        }
}

  
</style>
<div class="aboutgcoej">
    <div class="row" style="padding-top:40px;">
        <div class="col m12 s12" >
            <div class="about-item">
                <div class="about-text">
                    <h4 class="header" style="text-align:center;">Rules and Regulations</h4>
                        <hr>
                            <?php
                                include('conn.php');
                                $sq="SELECT * FROM text;";
                                $e_sq=mysqli_query($sql,$sq);
                                $result=mysqli_fetch_array($e_sq);
                                echo $result['text'];
                            ?>
                            
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
    <!-- Event Slides Section End -->

</div>
<?php
    include('footer.php');
?>
</body>
</html>