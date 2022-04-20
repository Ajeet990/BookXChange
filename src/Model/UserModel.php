<?php
namespace Book\Bookxchange\Model;

class UserModel
{
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login_model($uname, $upass)
    {
        $loginStmt = $this->conn->prepare("select * from register where user_name = ?");
        $loginStmt->bind_param("s", $uname);
        $loginStmt->execute();
        // echo "<pre>";
        // print_r($rst);

        $result = $loginStmt->get_result();
        $num_rows = $result->num_rows;
        if($num_rows > 0){
            // echo "user name found";
            $data = $result->fetch_assoc();
            // if($data['password'] == $upass){
                if (password_verify($upass, $data['password'])){
                return true;
            } else {
                return false;
            }
        }


    }

    public function getUserData()
    {

        //first way
        // $val = 0;
        // $allData = $this->conn->prepare("SELECT status, COUNT(*) as Num, sum(count(*)) over() as total
        // FROM register
        // WHERE user_type = ?
        // GROUP By status");

        // $allData->bind_param("i", $val);
        // $allData->execute();
        // $result = $allData->get_result();
        // $data = $result->fetch_all(MYSQLI_ASSOC);
        // echo "<pre>";
        // print_r($data);

        //second Way
        $bSatus = "blocked";
        $aStatus = "active";
        $user_type = 0;
        $allUserData = $this->conn->prepare("SELECT COUNT(*) as total, (select COUNT(*) FROM register where status = ? and user_type = ?) as blocked, (select COUNT(*) FROM register where status = ? and user_type = ?) as active
        From register
        WHERE user_type = ?");
        $allUserData->bind_param("sisii", $bSatus, $user_type, $aStatus, $user_type, $user_type);
        $allUserData->execute();
        $result = $allUserData->get_result();
        $data = $result->fetch_assoc();
        // echo "<pre>";
        // print_r($data);
        return $data;




    }
    public function getBookData()
    {
        $bSatus = "blocked";
        $aStatus = "active";

        $allBookData = $this->conn->prepare("SELECT COUNT(*) as total, (select COUNT(*) FROM books where status = ?) as blocked, (select COUNT(*) FROM books where status = ?) as active
        From books");
        $allBookData->bind_param("ss", $bSatus, $aStatus);
        $allBookData->execute();
        $result = $allBookData->get_result();
        $data = $result->fetch_assoc();
        // echo "<pre>";
        // print_r($data);
        return $data;
    }


    public function get_users_model()
    {

        
        $user_type = 0;
        $user_data = array();
        $getUserStmt = $this->conn->prepare("select * from register where user_type = ?");
        $getUserStmt->bind_param("i", $user_type);
        $getUserStmt->execute();

        $getUserData = $getUserStmt->get_result();
        while($row = $getUserData->fetch_array(MYSQLI_ASSOC)){
            array_push($user_data, $row);
        }
        return $user_data;
    }

    


    public function getUserDetails(int $id)
    {
        $userDetailsStmt = $this->conn->prepare("select * from register where id = ?");
        $userDetailsStmt->bind_param("i", $id);
        $userDetailsStmt->execute();
        $userResult = $userDetailsStmt->get_result();
        $data = $userResult->fetch_assoc();
        // echo "<pre>";
        // print_r($data);
        return $data;
    }

    public function userBookDetailsModel(int $id)
    {
        $userDetailsStmt = $this->conn->prepare("SELECT receiver.user_name as receiver_name, owner.user_name as owner_name, b.book_name, r.status, r.reason, r.rqst_copies, r.rqst_date, r.issued_date, r.return_date 
        FROM request as r
        INNER JOIN register as receiver ON receiver.id=r.requester_id
        INNER JOIN register as owner ON owner.id=r.owner_id
        INNER JOIN books as b ON b.id = r.book_id
        WHERE r.requester_id = ? order by r.rqst_date");
        $userDetailsStmt->bind_param("i", $id);
        $userDetailsStmt->execute();
        $result = $userDetailsStmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        // echo "<pre>";
        // print_r($data);
        return $data;

    }

    public function deleteUserModel(int $id){
        $userDltStmt = $this->conn->prepare("Delete from register where id = ?");
        $userDltStmt->bind_param("i", $id);
        $dltRst = $userDltStmt->execute();
        return true;

    }
    public function blockUserModel(int $id){
        $status = "blocked";
        $userDltStmt = $this->conn->prepare("update register set status = ? where id = ?");
        $userDltStmt->bind_param("si", $status, $id);
        $userDltStmt->execute();
        return true;


    }

    public function editUserFormModel(int $id)
    {
        $editUserStmt = $this->conn->prepare("select * from register where id = ?");
        $editUserStmt->bind_param("i", $id);
        $editUserStmt->execute();
        $result = $editUserStmt->get_result();
        $editArray = $result->fetch_array(MYSQLI_ASSOC);
        return $editArray;
        // echo "<pre>";
        // print_r($editArray);
    }

    public function updateUserModel(int $id, $uName, $uMobile, $uAddress, $uEmail, $uRating)
    {
        $updateStmt = $this->conn->prepare("update register set user_name = ?, mobile_no = ?, address = ?, email = ?, rating = ? where id = ?");
        $updateStmt->bind_param("ssssdi", $uName, $uMobile, $uAddress, $uEmail, $uRating, $id);
        $updateStmt->execute();
        return true;
    }

    public function unBlockUserModel(int $id)
    {
        $status = "active";
        $unBlockStmt = $this->conn->prepare("update register set status = ? where id = ?");
        $unBlockStmt->bind_param("si", $status, $id);
        $unBlockStmt->execute();
        return true;
    }
}