

<div class="home-container">
    <img src="img/gesmaster-logo.png" alt="">
    <form action="" method="post">
        <div class="search-bar">
            <input type="text" name="q" />
            <button type="submit" name="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <div class="container trends-container">
        <h1><i class="fas fa-fire-alt"></i>Popular trends</h1>
        <div class="trends">
            <?php foreach ($trends as $item) :?>
                <a href="<?php echo $homeUrl . "?q=" . urlencode($item); ?>" class="trend"><?php echo $item; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>


