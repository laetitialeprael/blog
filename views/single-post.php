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
                    <li class="list-inline-item">Par Auteur de l'article</li>
                    <li class="list-inline-item"><i class="fas fa-circle smaller mx-1 fw-bold"></i></li>
                    <li class="list-inline-item text-capitalize">Catégorie de l'article</li>
                    <li class="list-inline-item"><i class="fas fa-circle smaller mx-1 fw-bold"></i></li>
                    <li class="list-inline-item">Date</li>
                    <li class="list-inline-item"><i class="fas fa-circle smaller mx-1 fw-bold"></i></li>
                    <li class="list-inline-item">Nombre de commentaire</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="current-text text-gray">Contenu de l'article</p>
            </div>
        </div>
    </div>
</section>