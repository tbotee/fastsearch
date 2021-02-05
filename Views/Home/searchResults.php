<div class="container home-container results">
    <form action="" method="post" class="search-container">
        <a href="<?php echo $homeUrl; ?>"><img src="img/gesmaster-logo.png" alt=""></a>
        <div class="search-bar">
            <input type="text" name="q" value="<?php echo $inputVal; ?>"/>
            <button type="submit" name="submit"><i class="fas fa-search"></i></button>
        </div>
        <input id="q" type="hidden" value="<?php echo urlencode($q); ?>">
        <div class="filters">
            <?php if($socialMediaEnabled) : ?>
            <span>
                <input type="checkbox" id="social-media-toggle" checked/>
                Social Media
            </span>
            <?php endif; ?>
            <?php if($newsEnabled) : ?>
            <span>
                <input type="checkbox" id="news-toggle" checked/>
                News
            </span>
            <?php endif; ?>
            <?php if($celebritiesEnabled) : ?>
            <span>
                <input type="checkbox" id="celebrities-toggle" checked/>
                Celebrities
            </span>
            <?php endif; ?>
            <?php if($moviesEnabled) : ?>
            <span>
                <input type="checkbox" id="movies-toggle" checked/>
                Movies
            </span>
            <?php endif; ?>
        </div>
    </form>
</div>

<div class="container-fluid">
    <?php if($socialMediaEnabled) : ?>
    <div class="col" id="social-media-container">
        <h3>Social Media</h3>
        <div id="social-media">
            <div class="loading-container">
                <div class="loading">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="shape8"></div>
                    <div class="shape9"></div>
                    <div class="shape10"></div>
                    <div class="shape11"></div>
                    <div class="shape12"></div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($newsEnabled) : ?>
    <div class="col" id="news-container">
        <h3>News</h3>
        <div id="news">
            <div class="loading-container">
                <div class="loading">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="shape8"></div>
                    <div class="shape9"></div>
                    <div class="shape10"></div>
                    <div class="shape11"></div>
                    <div class="shape12"></div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($celebritiesEnabled) : ?>
    <div class="col" id="celebrities-container">
        <h3>Celebrities </h3>
        <div id="celebrities">
            <div class="loading-container">
                <div class="loading">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="shape8"></div>
                    <div class="shape9"></div>
                    <div class="shape10"></div>
                    <div class="shape11"></div>
                    <div class="shape12"></div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($moviesEnabled) : ?>
    <div class="col" id="movies-container">
        <h3>Movies</h3>
        <div id="movies">
            <div class="loading-container">
                <div class="loading">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>
                    <div class="shape4"></div>
                    <div class="shape5"></div>
                    <div class="shape6"></div>
                    <div class="shape7"></div>
                    <div class="shape8"></div>
                    <div class="shape9"></div>
                    <div class="shape10"></div>
                    <div class="shape11"></div>
                    <div class="shape12"></div>
                </div>
            </div>
        </div>

    </div>
    <?php endif; ?>
</div>

