<?php
namespace Book\Bookxchange\Controller;


require_once __DIR__ .'/../../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BookController
{
    private $loader;
    private $twig;


    public function __construct($book_m){

        $this->loader = new FilesystemLoader(__DIR__ . '/../view/templates');
        $this->twig = new Environment($this->loader);
        $this->book_m = $book_m;
    }

    public function get_books()
    {
        // global $admin_m;
        $b_list = $this->book_m->get_books_model();
        // $b_list = json_encode($b_list);
        return $this->twig->render('book_list.html.twig', ['b_array' => $b_list]);
    }

    public function blockBook(int $id)
    {
        // echo "blocking book";
        $blkBookRst = $this->book_m->blockBookModel($id);
        if($blkBookRst){
            $b_list = $this->book_m->get_books_model();
            $bookListHtml = $this->twig->render('book_list.html.twig', ['b_array' => $b_list]);
            $jsonresponse = [
                "html" => $bookListHtml
            ];
        
            echo json_encode($jsonresponse);
            exit;
        }




    }
    public function unBlockBook(int $id)
    {
        $unBlkBook = $this->book_m->unBlockBookModel($id);
        if($unBlkBook){
            $b_list = $this->book_m->get_books_model();
            $bookListHtml = $this->twig->render('book_list.html.twig', ['b_array' => $b_list]);
            $jsonresponse = [
                "html" => $bookListHtml
            ];
        
            echo json_encode($jsonresponse);
            exit;
        }

    }
    public function deleteBook(int $id)
    {
        $dltBook = $this->book_m->deleteBookModel($id);
        if($dltBook){
            $b_list = $this->book_m->get_books_model();
            $bookListHtml = $this->twig->render('book_list.html.twig', ['b_array' => $b_list]);
            $jsonresponse = [
                "html" => $bookListHtml
            ];
        
            echo json_encode($jsonresponse);
            exit;
        }
    }

    public function book_profile(int $id)
    {
        // echo "inside book controller";
        $bookHistory = $this->book_m->bookHistory($id);
        $bookDetails = $this->book_m->bookProfileModel($id);
        $original_date = $bookDetails['upload_date'];
        // echo $original_date;

        // // Creating timestamp from given date
        $timestamp = strtotime($original_date);
        // // Creating new date format from that timestamp
        $upload_date = date("d-m-Y", $timestamp);

        return $this->twig->render('book_profile.html.twig', ['bookDetails' => $bookDetails, 'bookHistory' => $bookHistory, 'upload_date' => $upload_date]);


    }

    public function getBookDetail(int $bookId)
    {
        $bookDetail = $this->book_m->getBookDetailModel($bookId);
        return $bookDetail;
    }

    public function updateBookDetails(int $id,string $bookName,string $bookGenre,string $bookAuthor,int $bookEdition,string $bookDescription,float $bookRating)
    {
        $updateBookDetail = $this->book_m->updateBookDetailsModel($id, $bookName, $bookGenre, $bookAuthor, $bookEdition, $bookDescription, $bookRating);
        return true;
    }
    
}