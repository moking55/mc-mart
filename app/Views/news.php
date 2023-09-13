<section class="hero is-primary is-halfheight has-text-centered has-background-image">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                ข่าวสารเซิร์ฟเวอร์
            </h1>
        </div>
    </div>
</section>

<section class="hero is-halfheight">
    <div class="hero-body">
        <div class="container mt-4 mb-4">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth ">
                    <nav class="panel" style="background: white">
                        <?php foreach ($newsList as $news) : ?>
                            <a href="/news/<?= $news['id'] ?>" class="panel-block p-4">
                                <i class="fas fa-angle-right fa-lg"></i>
                                <span class="panel-icon"></span>
                                <p><b>[ <?= $news['created_at'] ?> ]</b> <?= $news['title'] ?></p>
                            </a>
                        <?php endforeach ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>