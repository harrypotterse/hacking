<?php 
$query = "select * from  story ORDER BY `story`.`id` DESC limit 1;";
$array = array();
 $rows = $class->sql_feth($Data_communication, $query, $array);
if (count($rows) > 0) :
foreach ($rows as $value):
$id=$value['id'];
$Image=$value['Image'];
$Title=$value['Title'];
$Subtitle=$value['Subtitle'];
$Subject=$value['Subject'];
?>
<section class="about-me" id="about" style="background:#292929;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <img class="img-responsive" src="Public/story/<?php echo  $Image ; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="about-info" style="margin-top:55px;">
                            <div class="main-title">
                                <h2><?php echo  $Title ; ?></h2>
                            </div>
                            <h3><?php echo  $Subtitle ; ?></h3>
                            <p>
                                <?php echo  $Subject ; ?>
                            </p>
                            <a href="#facts" class="main-btn">لمتابعة فيدوهات الشرح</a>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
<?php
endforeach;
endif;
?>