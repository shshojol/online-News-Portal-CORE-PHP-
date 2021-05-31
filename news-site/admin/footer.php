<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
                    <?php
                        include "config.php";
                        $sql = "select * from setting";
                        $table = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($table);
                    ?>
            <div class="col-md-12">
                <span><?php echo $row['footer_desc']; ?></span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
