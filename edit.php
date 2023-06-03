<?php
include 'database.php';

if (isset($_POST['submit'])) {
    $dnb = $_POST['dnb'];
    $dc = $_POST['dc'];
    $pnvp = $_POST['pnvp'];
    $smm = $_POST['smm'];

    $sql = "UPDATE services SET `design&branding` = ?, `digital_campaigns` = ?, `photo&vid_prod` = ?, `social_media_marketing` = ? WHERE services_ID = '1'";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $dnb, $dc, $pnvp, $smm);

    if ($stmt->execute()) {
        header('Location: admin.php');
    } else {
        echo 'Error updating values: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
