<?php
global $product;
?>

<div class="product-labels">
    <?php if ($product->is_on_sale()) : ?>
        <div class="discount">

            <?php echo ts_get_percentage_to_sale_badge($product) ?>
        </div>
    <?php endif; ?>
</div>
