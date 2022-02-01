<?php
session_start();
session_destroy();
setcookie("user_id", "", time() - (86400 * 2), "/");
setcookie("user_email", "", time() - (86400 * 2), "/");
setcookie("session_id", "", time() - (86400 * 2), "/");
/*setcookie("first_name", "", time() - (86400 * 2), "/");
setcookie("last_name", "", time() - (86400 * 2), "/"); */
setcookie("user_type", "", time() - (86400 * 2), "/");
?>
<script type="text/JavaScript">
    localStorage.removeItem("activeTab");
    document.location = 'login_page.php';
</script>
<?php
//header("location: ./login_page.php");
?>
