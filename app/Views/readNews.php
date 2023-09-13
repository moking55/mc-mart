<style>
    .navbar {
        background-color: #23272A
    }

    .profile-avatar {
        border: 1px solid gray;
        padding: 3px;
        background: white;
        border-radius: 5px;
    }
</style>
<div class="news-bg-img">
    <section class="hero is-fullheight pt-6">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-quarter is-hidden-touch">
                        <div class="card" style="position:relative;top: 3em">
                            <div class="content" style="position:relative;bottom: 3em">
                                <div class="media mt-2">
                                    <div class="media-content has-text-centered" style="overflow: hidden">
                                        <img class="profile-avatar" src="https://mc-heads.net/avatar/<?= $newsContent['author'] ?>/120" alt="Placeholder image">
                                        <p class="title is-5"><?= $newsContent['author'] ?></p>
                                        <p class="subtitle is-6"><i class="fas fa-pen fa-xs"></i> ผู้เขียนบทความ</p>

                                        <small><?= $newsContent['created_at'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <h3 class="is-size-3 mb-2"><i class="far fa-newspaper"></i> <?= $newsContent['title'] ?></h3>
                        <div class="card">
                            <div class="card-content">
                                <div class="content">
                                    <p>
                                        <?= htmlspecialchars_decode($newsContent['content']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>