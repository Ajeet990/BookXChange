<?php
namespace Book\Bookxchange\Model;

class PermissionModel
{
    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function permission_model()
    {
       
        // global $conn;
        $allPermission = array();
        $userManagerPermission = array();
        $bookManagerPermission = array();
        // $userPermissionQry = "select * from permission where id = '1'";
        // $userPermissionRst = mysqli_query($this->conn, $userPermissionQry);
        // $row = mysqli_fetch_assoc($userPermissionRst);
        // array_push($userManagerPermission, $row);
        $userPermissionId = 1;
        $userPermissionStmt = $this->conn->prepare("select * from permission where id = ?");
        $userPermissionStmt->bind_param("i", $userPermissionId);
        $userPermissionStmt->execute();
        $userPermissionRst = $userPermissionStmt->get_result();
        $userPermission = $userPermissionRst->fetch_array(MYSQLI_ASSOC);
        array_push($userManagerPermission, $userPermission);

        // $bookPermissionQry = "select * from permission where id = '2'";
        // $bookPermissionRst = mysqli_query($this->conn, $bookPermissionQry);
        // $row = mysqli_fetch_assoc($bookPermissionRst);
        // array_push($bookManagerPermission, $row);
        $bookPermissionId = 2;
        $bookPermissionStmt = $this->conn->prepare("select * from permission where id = ?");
        $bookPermissionStmt->bind_param("i", $bookPermissionId);
        $bookPermissionStmt->execute();
        $bookPermissionRst = $bookPermissionStmt->get_result();
        $bookPermission = $bookPermissionRst->fetch_array(MYSQLI_ASSOC);
        array_push($bookManagerPermission, $bookPermission);

        array_push($allPermission, $userManagerPermission);
        array_push($allPermission, $bookManagerPermission);

        // echo "<pre>";
        // print_r($allPermission);
        return $allPermission;
    }

    public function set_permission_user_model($user_table, $book_table, $request, $setting)
    {

        $userPermissionId = 1;
        $userPermissionValue = 0;
        $value = 1;

        $setZeroStmt = $this->conn->prepare("update permission set user_table = ?, book_table = ?, request = ?,  settings = ? where id = ?");
        $setZeroStmt->bind_param("iiiii", $userPermissionValue, $userPermissionValue, $userPermissionValue, $userPermissionValue, $userPermissionId);
        $setZeroStmt->execute();
        if($user_table == 'yes'){
            $userTableStmt = $this->conn->prepare("update permission set user_table = ? where id = ?");
            $userTableStmt->bind_param("ii", $value, $userPermissionId);
            $userTableStmt->execute();
        }
        if($book_table == 'yes'){
            $bookTableStmt = $this->conn->prepare("update permission set book_table = ? where id = ?");
            $bookTableStmt->bind_param("ii", $value, $userPermissionId);
            $bookTableStmt->execute();
        }
        if($request == 'yes'){
            $requestStmt = $this->conn->prepare("update permission set request = ? where id = ?");
            $requestStmt->bind_param("ii", $value, $userPermissionId);
            $requestStmt->execute();
        }
        if($setting == 'yes'){
            $settingStmt = $this->conn->prepare("update permission set settings = ? where id = ?");
            $settingStmt->bind_param("ii", $value, $userPermissionId);
            $settingStmt->execute();
        }
        return true;



    }
    public function set_permission_book_model($user_table, $book_table, $request, $setting)
    {

        $bookPermissionId = 2;
        $bookPermissionValue = 0;
        $value = 1;

        $setZeroStmt = $this->conn->prepare("update permission set user_table = ?, book_table = ?, request = ?,  settings = ? where id = ?");
        $setZeroStmt->bind_param("iiiii", $bookPermissionValue, $bookPermissionValue, $bookPermissionValue, $bookPermissionValue, $bookPermissionId);
        $setZeroStmt->execute();
        if($user_table == 'yes'){
            $userTableStmt = $this->conn->prepare("update permission set user_table = ? where id = ?");
            $userTableStmt->bind_param("ii", $value, $bookPermissionId);
            $userTableStmt->execute();
        }
        if($book_table == 'yes'){
            $bookTableStmt = $this->conn->prepare("update permission set book_table = ? where id = ?");
            $bookTableStmt->bind_param("ii", $value, $bookPermissionId);
            $bookTableStmt->execute();
        }
        if($request == 'yes'){
            $requestStmt = $this->conn->prepare("update permission set request = ? where id = ?");
            $requestStmt->bind_param("ii", $value, $bookPermissionId);
            $requestStmt->execute();
        }
        if($setting == 'yes'){
            $settingStmt = $this->conn->prepare("update permission set settings = ? where id = ?");
            $settingStmt->bind_param("ii", $value, $bookPermissionId);
            $settingStmt->execute();
        }
        return true;
    }

    public function get_access_user_model()
    {

        $user_type = 2;
        $userAccessStmt = $this->conn->prepare("select * from permission where user_type = ?");
        $userAccessStmt->bind_param("i", $user_type);
        $userAccessStmt->execute();
        $userAccessRst = $userAccessStmt->get_result();
        $userAccessPermissions = $userAccessRst->fetch_array(MYSQLI_ASSOC);
        return $userAccessPermissions;
        // echo "<pre>";
        // print_r($userAccessPermissions);


    }
    public function get_access_book_model()
    {

        $book_type = 3;
        $bookAccessStmt = $this->conn->prepare("select * from permission where user_type = ?");
        $bookAccessStmt->bind_param("i", $book_type);
        $bookAccessStmt->execute();
        $bookAccessRst = $bookAccessStmt->get_result();
        $bookAccessPermissions = $bookAccessRst->fetch_array(MYSQLI_ASSOC);
        return $bookAccessPermissions;

    }
}