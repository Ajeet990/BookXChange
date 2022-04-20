<?php
namespace Book\Bookxchange\Model;

class RequestModel
{
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getRequests()
    {
        $allRequestStmt = $this->conn->prepare("SELECT borrower.user_name as Requester, r.requester_id, b.book_name as Book, r.book_id, owner.user_name as Book_Owner, r.owner_id, r.status, r.rqst_copies, r.rqst_date, r.issued_date,r.return_date
        FROM request as r 
        INNER JOIN register as borrower ON r.requester_id = borrower.id
        INNER JOIN books as b ON b.id = r.book_id
        INNER JOIN register as owner ON owner.id = r.owner_id");
        $allRequestStmt->execute();
        $result = $allRequestStmt->get_result();
        $allRequestData = $result->fetch_all(MYSQLI_ASSOC);

        return $allRequestData;

    }

}