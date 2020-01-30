<?php
require_once '../FileConnection/Data_connection.php';
require_once '../Classes/Achieve.php';
require_once '../FileConnection/Extra_functions.php';
$a = new Achieve();
$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 3;
$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
$sql = "SELECT * FROM app  WHERE 1 ORDER BY id ASC LIMIT $limit OFFSET $offset";
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
        $Title = $value['Title'];
        $Short_title = $value['Short_title'];
        $Explanation =   function_that_shortens_text_but_doesnt_cutoff_words(strip_tags($value['Explanation']), 250);    
        $image = $value['image'];
        $Download_it = $value['Download_it'];
        $Page = password_hash("app", PASSWORD_DEFAULT);
        ?>
        <div class="col-md-6">
            <!-- New Item -->
            <div class="post wow fadeInLeft" data-wow-duration="1.7s">
                <!-- Post Image -->
                <div class="post-img">
                    <img src="Public/app/<?php echo $image; ?>" class="img-responsive" alt="">
                </div>
                <!-- Post Content -->
                <div class="post-content">
                    <div class="post-title">
                        <a href="single.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>"><h4><?php echo $Title; ?></h4></a>
                    </div>
                    <div class="post-text">
                        <p>
                            <?php echo htmlentities($Explanation) ; ?>
                        </p>
                    </div>
                    <div class="post-footer">
                        <a href="single.php" class="post-more">للمزيد <i class="fa fa-angle-double-right"></i></a>
                        <div class="post-category">
                            <a href="single.php?id=<?php echo $id; ?>&Page=<?php echo $Page ?>">للمزيد من التفاصيل</a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <?php
    endforeach;
endif;
?>