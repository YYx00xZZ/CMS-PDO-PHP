<?php
session_start();
    include_once ('../includes/connection.php');
    include_once ('../includes/article.php');
if (isset($_SESSION['logged_in'])) {
    $article = new Article;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
            $data = $article->fetch_data($id);
    }
    ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <title>CMS</title>
    </head>
    <body>
        <div class="container">
            <?php include_once ('../assets/html/user-details-row.php'); ?>
            <a class="btn ml-3 mt-1" href="index.php">&larr; Back</a>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="update.php?id=<?php echo $data['article_id']; ?>">
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" class="form-control" type="text" value="<?php echo $data['article_title']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" rows="5" class="form-control"><?php echo $data['article_content']; ?></textarea>
                        </div>
                        <div class="form-group mt-1">
                            <button class="btn btn-warning form-control" type="submit" name="update">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <?php
            $pdo = null;
        ?>
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
    } else {
        header('location: index.php');
    }
?>