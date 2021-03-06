<?php

require_once ('../mysql.php');

header('Content-type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: ' . CORS);

if (isset($_REQUEST['email']) && filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL) && isset($_REQUEST['TrackID']))
{
    $email = $mysqli->real_escape_string($_REQUEST['email']);
    $TrackID = intval($_REQUEST['TrackID']);

    $mysqli->query('UPDATE Tracks T JOIN Users U ON (U.UserID = T.UserID)
                    SET T.IsFavorite = 1-T.IsFavorite 
                    WHERE U.Email = "' . $email. '"
                    AND T.TrackID = "' . $TrackID. '"');
    if ($mysqli->affected_rows == 1)
    {
        $result = $mysqli->query("SELECT IsFavorite FROM Tracks WHERE TrackID = '" . $TrackID . "' LIMIT 0,1");
        $row = $result->fetch_assoc();
        $json["IsFavorite"] = $row["IsFavorite"];

        // Send Result
        echo json_encode( $json );
    }
}
