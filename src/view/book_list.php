<?php
include '../../vendor/autoload.php';
include '../config/db.php';
include '../include/header.php';


if(isset($_SESSION['success'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success </strong>'.$_SESSION['success'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['success']);
}
if(isset($_SESSION['fail'])){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed </strong>'.$_SESSION['fail'].'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['fail']);
}

$bookListHtml = $book->get_books();

?>

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/bookAjax.js"></script>
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>

    <div id="bookListDiv"><?php echo $bookListHtml;?></div>
    
<?php include('../include/footer.php') ?>
