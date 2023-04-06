<?php 

    require_once "db.php";
    require_once "util.php";

    $db = new Database();
    $util = new Util();

    if (isset($_POST['add'])) {
        $citizenid = $util->testInput($_POST['citizenid']);
        $fname = $util->testInput($_POST['fname']);
        $email = $util->testInput($_POST['email']);
        $lname = $util->testInput($_POST['lname']);
        $sex = $util->testInput($_POST['sex']);
        $phone = $util->testInput($_POST['phone']);
        $img = "nnn1.png"; //$util->testInput($_POST['img']);        

        if ($db->insert($email, $citizenid, $fname, $lname, $sex, $phone, $img)) {
            echo $util->showMessage("success", "User inserted successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    if (isset($_GET['read'])) {
        $users = $db->read();
        $output = '';
        if ($users) {
            foreach($users as $row) {
                $output .= '<tr>
                            <td>' . $row['citizen_id'] . '</td>
                            <td>' . $row['fname'] . '</td>
                            <td>' . $row['lname'] . '</td>
                            <td>' . $row['sex'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['phone'] . '</td>
                            <td>
                                <a href="#" id="'. $row['id'] .'" class="btn btn-success btn-sm rounded-pull py-0 editlink" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</a>
                                <a href="#" id="'. $row['id'] .'" class="btn btn-danger btn-sm rounded-pull py-0 deletelink">Delete</a>
                            </td>
                </tr>';
            }
            echo $output;
        } else {
            echo '<tr>
                <td colspan="6">No users found in the Database</td>
            </tr>';
        }
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['id'];
        $user = $db->readOne($id);
        echo json_encode($user);
    }

    if (isset($_POST['update'])) {
        $citizenid = $util->testInput($_POST['citizenid']);
        $fname = $util->testInput($_POST['fname']);
        $email = $util->testInput($_POST['email']);
        $lname = $util->testInput($_POST['lname']);
        $sex = $util->testInput($_POST['sex']);
        $phone = $util->testInput($_POST['phone']);
        $img = $util->testInput($_POST['img']);

        if ($db->update($id, $email, $citizenid, $fname, $lname, $sex, $phone, $img)) {
            echo $util->showMessage("success", "User updated successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['id'];
        if ($db->delete($id)) {
            echo $util->showMessage("info", "User deleted successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

?>