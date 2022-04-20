<?php
namespace Book\Bookxchange\Model;

class SettingModel
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function allSettings_model()
    {

        $allSettingStmt = $this->conn->prepare("select * from setting");
        $allSettingStmt->execute();
        $all = $allSettingStmt->get_result();

        $allSetting = $all->fetch_all(MYSQLI_ASSOC);
        return $allSetting;
        // echo "<pre>";
        // print_r($allSetting);

    }

    public function setTitleModel(String $title)
    {

        $site_title = "site_title";
        $updateTitleStmt = $this->conn->prepare("update setting set value = ? where name = ?");
        $updateTitleStmt->bind_param("ss", $title, $site_title);
        $updateTitleStmt->execute();
        return true;
    }
    public function setMailModel(string $mail)
    {
        $mail_from = "mail_from";

        $updateMailStmt = $this->conn->prepare("update setting set value = ? where name = ?");
        $updateMailStmt->bind_param("ss", $mail, $mail_from);
        $updateMailStmt->execute();
        return true;
    }
    public function setWlcModel(string $welcome)
    {
        $welcome_text = "welcome_text";

        $updateWelcomeStmt = $this->conn->prepare("update setting set value = ? where name = ?");
        $updateWelcomeStmt->bind_param("ss", $welcome, $welcome_text);
        $updateWelcomeStmt->execute();
        return true;
    }

    public function updateLogo_model($logo)
    {
        // global $conn;
        $img_name = $logo['name'];
        $img_path = $logo['tmp_name'];

        $dest = "../img/".$img_name;
        move_uploaded_file($img_path, $dest);

        $logo = "logo";
        $updateLogoStmt = $this->conn->prepare("update setting set value = ? where name = ?");
        $updateLogoStmt->bind_param("ss", $dest, $logo);
        $updateLogoStmt->execute();
        return true;

    }

    public function getTitle_model()
    {

        $title = "site_title";
        $getTitleStmt = $this->conn->prepare("select value from setting where name = ?");
        $getTitleStmt->bind_param("s", $title);
        $getTitleStmt->execute();
        $getTitleResult = $getTitleStmt->get_result();
        $site_title = $getTitleResult->fetch_array(MYSQLI_ASSOC);
        return $site_title['value'];
    }

    public function getLogo_model()
    {

        $logo = "logo";
        $getLogoStmt = $this->conn->prepare("select value from setting where name = ?");
        $getLogoStmt->bind_param("s", $logo);
        $getLogoStmt->execute();
        $getLogoRst = $getLogoStmt->get_result();
        $logo_name = $getLogoRst->fetch_array(MYSQLI_ASSOC);
        // $logo_name = $logo_name['value'];
        // $logo_name = substr($logo_name, 7);
        return $logo_name;
        // echo $logo_name;
        
    }

    public function getWelcome_model(){

        $wlc = "welcome_text";
        $getWlcStmt = $this->conn->prepare("select value from setting where name = ?");
        $getWlcStmt->bind_param("s", $wlc);
        $getWlcStmt->execute();
        $getWlcResult = $getWlcStmt->get_result();
        $Wlc = $getWlcResult->fetch_array(MYSQLI_ASSOC);
        return $Wlc['value'];
    }

    


}