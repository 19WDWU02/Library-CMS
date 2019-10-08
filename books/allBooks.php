<?php require('../templates/header.php'); ?>

        <div class="row mb-2">
            <div class="col">
                <h1>All Books</h1>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <a class="btn btn-outline-primary" href="books/addBook.php">Add new Book</a>
            </div>
        </div>

        <div class="row d-flex">
            <div class="col-12 col-md-3">
                 <div class="card mb-4 shadow-sm h-100">
                     <img class="card-img-top" src="images/HarryPotter1.jpg" alt="Card image cap">
                     <div class="card-body">
                         <p class="card-text">Harry Potter and the Philosopher's Stone</p>
                         <div class="d-flex justify-content-between align-items-center">
                             <div class="btn-group">
                                 <a href="books/singleBook.php" class="btn btn-sm btn-outline-info">View</a>
                                 <a href="" class="btn btn-sm btn-outline-secondary">Edit</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
        </div>

<?php require('../templates/footer.php'); ?>
