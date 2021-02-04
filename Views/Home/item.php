<a class="result-item <?php echo strtolower($item->source); ?>" href="<?php echo $item->url; ?>" target="_blank">
    <?php if ($item->image != ""): ?>
        <img src="<?php echo $item->image; ?>" alt="" class="thumbnail">
    <?php endif; ?>
    <div class="text">
        <div class="title"><?php echo $item->title; ?></div>
<!--        <div class="description">--><?php //echo $item->description; ?><!--</div>-->
    </div>
</a>
