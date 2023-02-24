<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>

<h1>Settings</h1>
<?php
global $wpdb;
$user_id = get_current_user_id();
if(isset($_POST["submit"])){
    $data["app_version"] = $_POST["app_version"];
    foreach ($data as $key => $value) {
        update_option($key, $value);
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <table class="ui collapsing striped table">
        <tr>
            <td>App Version</td>
            <td><input type="text" name="app_version" >
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Save" class="ui blue mini button"></td>
        </tr>
    </table>
</form>
<?php
$data["app_version"] = get_option("app_version");
?>
    <script type="text/javascript">
        jQuery('input[name=app_version]').val('<?php echo $data["app_version"]; ?>');
    </script>
<script type="text/javascript">
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>