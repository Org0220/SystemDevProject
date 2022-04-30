<?php

session_start();

function isLoggedIn()
{
    
    if (isset($_SESSION['client_id'])) {
        return true;
    } else {
        return false;
    }
}

function is_admin_logged_in()
{
    return isset($_SESSION['admin']);
}

function image_upload()
{
    //default value for the picture
    $filename = false;

    //save the file that gets sent as a picture
    $file = $_FILES['picture'];

    $acceptedTypes = [
        'image/jpeg' => 'jpg',
        'image/gif' => 'gif',
        'image/png' => 'png'
    ];

    //validate the file
    if (empty($file['tmp_name']))
        return false;

    $fileData = getimagesize($file['tmp_name']);

    if (
        $fileData != false &&
        in_array($fileData['mime'], array_keys($acceptedTypes))
    ) {

        //save the file to its permanent location

        $folder = dirname(APPROOT) . '/public/img';
        $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
        move_uploaded_file($file['tmp_name'], "$folder/$filename");
    }

    return $filename;
}
