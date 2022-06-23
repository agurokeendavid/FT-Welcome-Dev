<?php
//defined('BASEPATH') or exit('No direct script access allowed');

$action = $_GET['action'];
const ACTION_CREATE = 'create';
const ACTION_READ = 'read';
switch ($action) {
    case ACTION_CREATE:
        try {
            if ($_POST) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $bio = $_POST['bio'];
                if (file_exists('accounts.json')) {
                    $current_accounts = file_get_contents('accounts.json');
                    $accounts_array = json_decode($current_accounts, true);
                    $accounts_array['data'] = array(
                        'name' => $name,
                        'email' => $email,
                        'bio' => $bio
                    );

                    if (file_put_contents('accounts.json', json_encode($accounts_array))) {
                        echo json_encode('Data has been successfully submitted.');
                    } else {
                        echo json_encode('Failed creating account');
                    }
                    return;
                }
                echo json_encode('File does not exist.');
                return;
            }
        } catch (Exception $exception) {
            echo json_encode('Error creating account');
            return;
        }
        break;
    case ACTION_READ:
        if (!$_GET) {
            return;
        }

        if (file_exists('accounts.json')) {
            $current_accounts = file_get_contents('accounts.json');
            $accounts_array = json_decode($current_accounts, true);
            echo json_encode($accounts_array['data']);
            return;
        }
        echo json_encode('File does not exist.');
        return;
        break;
}

?>