<?php
require_once '../FileConnection/Data_connection.php';
require_once '../Classes/Achieve.php';
$a = new Achieve();
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 3;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
$sql = "SELECT * FROM blog  WHERE 1 ORDER BY id ASC LIMIT $limit OFFSET $offset";
try {
    $stmt = $Data_communication->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
if (count($results) > 0) :
    foreach ($results as $value):
        $id = $value['id'];
        $Subject = $value['Subject'];
        $Date = $value['Date'];
        $Abstract = $value['Abstract'];
        $Explanation = $value['Explanation'];
        $Image = $value['Image'];
         $Page = password_hash("blog", PASSWORD_DEFAULT);
        ?>
        <div class="col-md-12">
            <!-- New Item -->
            <div class="post wow fadeInLeft" data-wow-duration="1.7s">
                <!-- Post Image -->
                <div class="post-img">
                    <img src="Public/blog/<?php echo $Image; ?>" class="img-responsive" alt="">
                </div>
                <!-- Post Content -->
                <div class="post-content">
                    <div class="post-title">
                        <a href="single_blog.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>" ><h4><?php echo $Subject; ?></h4></a>
                    </div>
                    <ul class="post-info list-unstyled">
                        <li>
                            <i class="fa fa-calendar"></i>
                            <span><?php echo $Date; ?></span>
                        </li>     
                    </ul>
                    <div class="post-text">
                        <p><?php echo $Abstract; ?></p>
                    </div>
                    <div class="post-footer">
                        <a href="#" class="post-more">للمزيد <i class="fa fa-angle-double-right"></i></a>
                        <div class="post-category">
                            <a href="single_blog.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>">للمزيد</a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <?php
    endforeach;
endif;
?>
