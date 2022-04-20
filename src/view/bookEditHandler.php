<?php
include '../../vendor/autoload.php';
include '../config/db.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Book\Bookxchange\Model\BookModel;


$book_m = new BookModel($conn);
$book = new \Book\Bookxchange\Controller\BookController($book_m);
$loader = new FilesystemLoader(__DIR__ . '/../view/templates');
$twig = new Environment($loader);

//code to get book details on the modal to edit
if(isset($_POST['bookID']) && $_POST['bookID'] != ""){
    
    $bookId = intval($_POST['bookID']);

    $bookDetail = $book->getBookDetail($bookId);
    echo json_encode($bookDetail);

}

//code to update bookDetail that are filled in modal
if(isset($_POST['BookId'])){
    $id = $_POST['BookId'];
    $bookName = $_POST['bookName'];
    $bookGenre = $_POST['bookGenre'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookEdition = $_POST['bookEdition'];
    $bookDescription = $_POST['bookDescription'];
    $bookRating = $_POST['bookRating'];

    $updateBook = $book->updateBookDetails($id, $bookName, $bookGenre, $bookAuthor, $bookEdition, $bookDescription, $bookRating);
    if($updateBook) {
        $b_list = $book_m->get_books_model();
        $bookListHtml = $twig->render('book_list.html.twig', ['b_array' => $b_list]);
        $jsonresponse = [
            "html" => $bookListHtml
        ];

        echo json_encode($jsonresponse);
        exit;
    }

    
}



?>