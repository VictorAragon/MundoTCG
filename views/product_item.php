<div class="product_item">
    <a href="#">
        <div class="product_tags">
            <?php 
            if($sale == "1"){ ?>
                <div class="product_tag red"><?php $this->lang->get("SALE") ?></div>
            <?php } 
            if($bestseller == "1"){ ?>
                <div class="product_tag green"><?php $this->lang->get("BESTSELLER") ?></div>
            <?php } 
            if($newProduct == "1"){ ?>
                <div class="product_tag blue"><?php $this->lang->get("NEW") ?></div>
            <?php } ?>
        </div>
        <div class="product_image">
            <img src="<?php echo BASE_URL;?>/assets/images/pokemon/cartas/<?php echo $images[0]["url"] ?>" style="width: 100%;">
        </div>
        <div class="product_name"><?php echo $name; ?></div>
        <div class="product_brand"><?php echo $brandName; ?></div>
        <div class="product_priceMin"><?php if($minPrice != 0){echo "R$ ".number_format($minPrice, 2,',','.');} ?></div>
        <div class="product_priceMed"><?php if($medPrice != 0){echo "R$ ".number_format($medPrice, 2,',','.');} ?></div>
        <div class="product_priceMax"><?php if($maxPrice != 0){echo "R$ ".number_format($maxPrice, 2,',','.');} ?></div>
        <div style="clear: both;"></div>
    </a>
</div>