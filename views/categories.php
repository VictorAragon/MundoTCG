<?php echo $categoryName; ?>

<div class="row">
    <?php
    $a = 0;
    foreach($list AS $product_item){ ?>
        <div class="col-sm-4">
            <?php $this->loadView("product_item", $product_item); ?>    
        </div>
        <?php
        if($a >= 2){
            $a = 0;
            echo "</div><div class='row'>";
        }else{
            $a++;
        }
    } ?>
</div>

<div class="paginationArea">
<?php
for($q=1; $q<=$numberOfPages; $q++){ ?>
    <div class="paginationItem <?php echo ($currentPage == $q)? 'pageActive':'' ?>"><a href="<?php echo BASE_URL;?>categories/enter/<?php echo $idCategory;?>?p=<?php echo $q;?>"><?php echo $q;?></a></div>
<?php
}
?>
</div>