<?php
    require('../templates/header.php');

    if(isset($_GET['id'])){
        // var_dump('We are editing a book');
        $pageTitle = 'Edit Book';
        $bookID = $_GET['id'];
        // $sql = "SELECT * FROM `books` WHERE _id = $bookID";
        $sql = "SELECT books.`_id` as bookID, `title`, `year`, `description`, authors.name as author FROM `books` INNER JOIN authors ON books.author_id = authors._id WHERE books._id = $bookID";
        $result = mysqli_query($dbc, $sql);
        if($result && mysqli_affected_rows($dbc) > 0){
            $singleBook = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // var_dump($singleBook);
            extract($singleBook);
        } else if($result && mysqli_affected_rows($dbc) === 0){
            header('Location: ../errors/404.php');
        } else {
            die('Something went wrong with getting a single book to edit');
        }
    } else {
        // var_dump('We are adding a  new book');
        $pageTitle = 'Add New Book';
    }

    if($_POST){
        // var_dump($_POST);
        // var_dump('you have submitted a form');
        extract($_POST);
        // var_dump($title);
        // var_dump($author);
        // var_dump($description);

        $errors = array();

        if(empty($title)){
            // var_dump('the title is empty');
            array_push($errors, 'The title is empty, please add a value.');
        } else if(strlen($title) < 5 ){
            // var_dump('the length must be at least 5');
            array_push($errors, 'The title length must be at least 5 characters.');
        } else if(strlen($title) > 100){
            // var_dump('the length must less than 100');
            array_push($errors, 'The title length must be no more than 100 characters.');
        }

        if(empty($author)){
            array_push($errors, 'The Author is empty, please add a value.');
        } else if(strlen($author) < 5 ){
            array_push($errors, 'The Author length must be at least 5 characters.');
        } else if(strlen($author) > 100){
            array_push($errors, 'The Author length must be no more than 100 characters.');
        }

        if(empty($year)){
            array_push($errors, 'The Year is empty, please add a value.');
        } else if(strlen($year) > 4 ){
            array_push($errors, 'The Year length must be less than 4 characters.');
        }

        if(empty($description)){
            array_push($errors, 'The Description is empty, please add a value.');
        } else if(strlen($description) < 10 ){
            array_push($errors, 'The Description length must be at least 10 characters.');
        } else if(strlen($description) > 65535){
            array_push($errors, 'The title length must be no more than 65535 characters.');
        }


        if(empty($errors)){
            // $title = mysqli_real_escape_string($dbc, $title);
            $safeTitle = mysqli_real_escape_string($dbc, $title);
            $safeAuthor = mysqli_real_escape_string($dbc, $author);
            $safeYear = mysqli_real_escape_string($dbc, $year);
            $safeDescription = mysqli_real_escape_string($dbc, $description);

            $findSql = "SELECT * FROM `authors` WHERE name = '$safeAuthor'";
            $findResult = mysqli_query($dbc, $findSql);
            if($findResult && mysqli_affected_rows($dbc) > 0){
                $foundAuthor = mysqli_fetch_array($findResult, MYSQLI_ASSOC);
                $authorID = $foundAuthor['_id'];
            } else if($findResult && mysqli_affected_rows($dbc) === 0) {
                $sql = "INSERT INTO `authors`(`name`) VALUES ('$safeAuthor')";
                $result = mysqli_query($dbc, $sql);
                if($result && mysqli_affected_rows($dbc) > 0){
                    $authorID = $dbc->insert_id;
                } else {
                    die('Something went wrong with adding in our author');
                }
            } else {
                die('Something went wrong with finding an author');
            }

            if(isset($_GET['id'])){
                $booksSql = "UPDATE `books` SET `title`='$safeTitle',`year`=$safeYear,`description`='$safeDescription',`author_id`=$authorID WHERE _id = $bookID";
            } else {
                $booksSql = "INSERT INTO `books`( `title`, `year`, `description`, `author_id`) VALUES ('$safeTitle',$safeYear,'$safeDescription',$authorID)";
            }
            var_dump($booksSql);
            die();
            $booksResult = mysqli_query($dbc, $booksSql);
            if($booksResult && mysqli_affected_rows($dbc) > 0){
                if(!isset($_GET['id'])){
                    $bookID = $dbc->insert_id;
                }
                header('Location: singleBook.php?id='.$bookID);
            } else {
                die('Something went wrong with adding in our books');
            }
        }

    }

?>

        <div class="row mb-2">
            <div class="col">
                <h1><?php echo $pageTitle; ?></h1>
            </div>
        </div>

        <?php if($_POST && !empty($errors)): ?>
            <div class="row mb-2">
                <div class="col">
                    <div class="alert alert-danger pb-0" role="alert">
                        <ul>
                            <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row mb-2">
            <div class="col">
                <form action="./books/addBook.php<?php if(isset($_GET['id'])){ echo '?id='.$_GET['id'];};?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                      <label for="title">Book Title</label>
                      <input type="text" class="form-control" name="title"  placeholder="Enter book title" value="<?php if(isset($title)){ echo $title; };?>">
                    </div>

                    <div class="form-group">
                      <label for="year">Year</label>
                      <input type="number" autocomplete="off" class="form-control"  name="year" placeholder="Enter the year it was released" max="<?php echo date('Y'); ?>" value="<?php if(isset($year)){ echo $year; }; ?>">
                    </div>

                    <div class="form-group author-group">
                      <label for="author">Author</label>
                      <input type="text" autocomplete="off" class="form-control"  name="author" placeholder="Enter books author" value="<?php if(isset($author)){ echo $author; }; ?>">
                    </div>

                    <div class="form-group">
                      <label for="description">Book Description</label>
                      <textarea class="form-control" name="description" rows="8" cols="80" placeholder="Description about the book"><?php if(isset($description)){ echo $description; }; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload an Image</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-outline-info btn-block">Submit</button>
                </form>
            </div>
        </div>

<?php require('../templates/footer.php'); ?>
