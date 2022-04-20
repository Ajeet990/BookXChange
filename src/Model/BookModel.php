<?php
namespace Book\Bookxchange\Model;

class BookModel
{
    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function get_books_model()
    {

        // $getBooksStmt = $this->conn->prepare("select * from books");
        $getBooksStmt = $this->conn->prepare("SELECT b.* , r.user_name as ownerName
        FROM books as b
        INNER JOIN register as r ON b.owner_id = r.id");

        $getBooksStmt->execute();

        $getBooksData = $getBooksStmt->get_result();

        $books_data = $getBooksData->fetch_all(MYSQLI_ASSOC);
        return $books_data;
        // echo "<pre>";
        // print_r($books_data);
    }

    public function blockBookModel(int $id)
    {
        $status = "blocked";
        $blkBookStmt = $this->conn->prepare("update books set status = ? where id = ?");
        $blkBookStmt->bind_param("si", $status, $id);
        $blkBookStmt->execute();

        return true;
        // echo "blocking book id ".$id;


    }

    public function unBlockBookModel(int $id)
    {
        $status = "active";
        $unblkBookStmt = $this->conn->prepare("update books set status = ? where id = ?");
        $unblkBookStmt->bind_param("si", $status, $id);
        $unblkBookStmt->execute();
        return true;

    }

    public function deleteBookModel(int $id)
    {
        $dltBookStmt = $this->conn->prepare("delete from books where id = ?");
        $dltBookStmt->bind_param("i", $id);
        $dltBookStmt->execute();
        return true;
        // echo "deleting ";
    }

    public function bookProfileModel(int $id)
    {
        $bookDetailStmt = $this->conn->prepare("select * from books where id = ?");
        $bookDetailStmt->bind_param("i", $id);
        $bookDetailStmt->execute();
        $bookResult = $bookDetailStmt->get_result();
        $bookDetail = $bookResult->fetch_assoc();
        // echo "<pre>";
        // print_r($bookDetail);
        
        // die;
        
        return $bookDetail;
    }

    public function bookHistory(int $id)
    {
        $bookHistoryStmt = $this->conn->prepare("SELECT b.book_name,rg.user_name as requester, r.status, r.reason, r.rqst_copies, r.rqst_date, r.issued_date, r.return_date
        FROM request as r 
        INNER JOIN books as b ON b.id = r.book_id
        INNER JOIN register as rg ON rg.id = r.requester_id
        WHERE book_id = ?");

        $bookHistoryStmt->bind_param("i", $id);
        $bookHistoryStmt->execute();
        $bookHistoryRst = $bookHistoryStmt->get_result();
        $result = $bookHistoryRst->fetch_all(MYSQLI_ASSOC);
        // echo "<pre>";
        // print_r($result);
        // echo "herel";
        return $result;

    }

    public function getBookDetailModel(int $bookId)
    {
        $bookDetailStmt = $this->conn->prepare("select * from books where id = ?");
        $bookDetailStmt->bind_param("i", $bookId);
        $bookDetailStmt->execute();
        $result = $bookDetailStmt->get_result();
        $bookDetail = $result->fetch_assoc();
        // echo "<pre>";
        // print_r($bookDetail);
        return $bookDetail;

    }

    public function updateBookDetailsModel(int $id,string $bookName,string $bookGenre,string $bookAuthor,int $bookEdition,string $bookDescription, float $bookRating)
    {
        $updateBookStmt = $this->conn->prepare("update books set book_name = ?, genre = ?, author = ?, edition = ?, description = ?, rating = ? where id = ?");
        $updateBookStmt->bind_param("sssisdi", $bookName, $bookGenre, $bookAuthor, $bookEdition, $bookDescription, $bookRating, $id);
        $updateBookStmt->execute();
        return true;

    }
}