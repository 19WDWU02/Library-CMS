<?php require('templates/header.php'); ?>

        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="row">
                <div class="col-12 col-md px-0 text-center text-md-left ">
                    <h1 class="display-5 font-italic">Harry Potter and the Philosopher's Stone</h1>
                    <p class="lead my-3">Harry Potter has been living an ordinary life, constantly abused by his surly and cold aunt and uncle, Vernon and Petunia Dursley and bullied by their spoiled son Dudley since the death of his parents ten years prior. His life changes on the day of his eleventh birthday when he receives a letter of acceptance into a Hogwarts School of Witchcraft and Wizardry.</p>
                    <p class="lead mb-0"><a href="books/singleBook.php" class="text-white font-weight-bold">Continue reading...</a></p>
                </div>
                <div class="col-12 col-md-4 pt-5 pt-md-0">
                    <img src="images/HarryPotter1.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-md-6">
                <div class="card mb-3 h-100">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-8">
                            <div class="card-body">
                                <strong class="d-inline-block mb-2 text-primary">Books</strong>
                                <h3 class="mb-0"><a class="text-dark" href="#">Latest Book Title</a></h3>
                                <div class="mb-1 text-muted">Nov 12</div>
                                <p class="card-text mb-auto">Harry Potter and the Philosopher's Stone.</p>
                                <a href="books/singleBook.php">Continue reading</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <img src="images/HarryPotter1.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card mb-3 h-100">
                    <div class="row no-gutters">
                        <div class="col-12 col-md-8">
                            <div class="card-body">
                                <strong class="d-inline-block mb-2 text-success">Movies</strong>
                                <h3 class="mb-0"><a class="text-dark" href="#">Latest Movie Title</a></h3>
                                <div class="mb-1 text-muted">Nov 11</div>
                                <p class="card-text mb-auto">Iron Man</p>
                                <a href="#">Continue reading</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <img src="images/IronMan1.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require('templates/footer.php'); ?>
