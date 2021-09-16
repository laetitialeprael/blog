<section>
    <div class="container">
        <div class="row d-flex justify-content-lg-between">
            <div class="col-12">
                <nav class="mb-3 current-text text-gray" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/blog/">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="/blog/article">Blog</a></li>
                        <li class="breadcrumb-item"><?php echo $post->getTitle(); ?></li>
                    </ol>
                </nav>
                <h1 class="display-6"><?php echo $post->getTitle(); ?></h1>
                <ul class="list-unstyled list-inline current-text text-gray">
                    <li class="list-inline-item">Par <?php echo $post->viewAuthor(); ?></li>
                    <li class="list-inline-item"><i class="fas fa-circle smaller mx-1 fw-bold"></i></li>
                    <li class="list-inline-item text-capitalize"><?php echo $post->getCategory(); ?></li>
                    <li class="list-inline-item"><i class="fas fa-circle smaller mx-1 fw-bold"></i></li>
                    <li class="list-inline-item"><?php echo $post->getPublishedDate(); ?></li>
                    <li class="list-inline-item"><i class="fas fa-circle smaller mx-1 fw-bold"></i></li>
                    <li class="list-inline-item">Nombre de commentaire (<?php echo $count['approved']; ?>)</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pt-0">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="current-text text-gray"><?php echo $post->getIntroduction(); ?></p>
                <p class="current-text text-gray"><?php echo $post->getContent(); ?></p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Commentaire</h2>
                    <?php if (isset($_SESSION['message-valid-comment'])): ?>
                        <div class="row mb-3">
                            <div class="col mx-auto p-3 bg-light text-valid border-valid">
                                <p class="m-0"><?php echo $_SESSION['message-valid-comment']; ?></p>
                                <?php unset($_SESSION['message-valid-comment']); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php if ( empty($comments) ): ?>
                    <p class="current-text">Il n'y a pas de commentaire, rédigez le premier !</p>
                <?php endif; ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment-container border-top border-light pt-3">
                        <div class="comment-text">
                            <p class="current-text"><?php echo $comment->getMessage(); ?></p>
                        </div>
                        <div class="comment-author">
                            <p class="current-text mb-0 fw-bold"><?php echo $comment->viewAuthor(); ?></p>
                            <p class="current-text text-gray"><?php echo $comment->getDate(); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php if(isset($_SESSION['user']['role'])): ?>
                    <form class="needs-validation" method="post" novalidate>
                        <div class="mb-3">
                            <label for="message" class="form-label h3">Votre commentaire sur l'article</label>
                            <textarea required name="message" class="form-control" id="message" rows="9"></textarea>
                            <div class="invalid-feedback"><p>Oops ! Vous devez rédiger un commentaire.</p></div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Enregistrer" class="btn btn-primary rounded-0" />
                        </div>
                    </form>
                <?php else: ?>
                    <p class="h3 text-center mb-3">Vous souhaitez écrire un commentaire sur l'article ?</p>
                    <div class="text-center">
                        <a href="/blog/connexion" class="btn btn-primary rounded-0 mb-3">Connexion</a>
                        <p class="current-text">Vous n'avez pas de compte, <a href="/blog/creer-un-compte">créez-en un</a>.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>