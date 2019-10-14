<?php
require('../templates/header.php');

$sql = "SELECT `_id`, `title` FROM `books` WHERE 1";
$result = mysqli_query($dbc, $sql);
if($result){
    $allBooks = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    die('Something went wrong with getting all of our books');
}
?>

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
    <?php if($allBooks): ?>
        <?php foreach($allBooks as $singleBook): ?>
            <div class="col-12 col-md-3 pb-3">
                <div class="card mb-4 shadow-sm h-100">
                    <img class="card-img-top" src="images/HarryPotter1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><?php echo $singleBook['title']; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="books/singleBook.php?id=<?php echo $singleBook['_id']; ?>" class="btn btn-sm btn-outline-info">View</a>
                                <a href="books/addBook.php?id=<?php echo $singleBook['_id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <p>Sorry, there aren't any books in the library right now.</p>
        </div>
    <?php endif; ?>
</div>

<?php require('../templates/footer.php'); ?>
