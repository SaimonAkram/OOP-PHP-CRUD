<?php

$insert = false;
$update = false;
$delete = false;
class Model
{

    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "crud-task";

    public function __construct()
    {
        try {

            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }

    public function fetch()
    {
       
        $sql = "SELECT * FROM `bookinfo`";
        if ($result = $this->conn->query($sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $data[] = $row;

               
            }
        }
        
        return $data;
    }

    public function delete($sno)
    {
        $sql = "DELETE FROM bookinfo WHERE sno = $sno";

        if ($result = $this->conn->query($sql)) {
            return $delete= true;
        } else {
            return false;
        }
    }
}


$model = new Model();
if (isset($_POST['submit'])) {
    $book_name = $_POST["book_name"];
    $image_file = $_FILES['image_file']['name'];
    $dir = $_FILES['image_file']['tmp_name'];
    $des = './images/' . $image_file;

    $borrow_date = date("Y-m-d", strtotime($_POST["borrow_date"]));
    $return_date = date("Y-m-d", strtotime($_POST["return_date"]));
    $student_name = $_POST["student_name"];
    $member_type = $_POST["member_type"];
    $description = $_POST["description"];
    $academic_class = $_POST["academic_class"];

    // Sql query to be executed

    $sql = "INSERT INTO bookinfo (sno, book_name, image_file, borrow_date, return_date, student_name, member_type, description, academic_class) VALUES ('0', '$book_name', ' $des', '$borrow_date', '$return_date', '$student_name', '$member_type', '$description', '$academic_class')";


    if ($result = $model->conn->query($sql)) {
        $insert = true;
        move_uploaded_file($dir, $des);

        // echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('failed');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}

if (isset($_POST['update-btn'])) {


    $sno = $_POST["snoEdit"];
    $book_name = $_POST["book_nameEdit"];
    $borrow_date = $_POST["borrow_dateEdit"];
    $return_date = $_POST["return_dateEdit"];
    $student_name = $_POST["student_nameEdit"];
    $member_type = $_POST["member_typeEdit"];
    $description = $_POST["descriptionEdit"];
    $academic_class = $_POST["academic_classEdit"];

    // Sql query to be executed

    $sql = "UPDATE bookinfo SET book_name = '$book_name', borrow_date = '$borrow_date', return_date = '$return_date', student_name = '$student_name', member_type = '$member_type', description = '$description', academic_class = ' $academic_class' WHERE bookinfo.`sno` = $sno";
    $result = mysqli_query($model->conn, $sql);

    if ($result) {
        $update = true;
    } else {
        echo "We could not update the record successfully";
    }
}

// if (isset($_GET['id'])) {

//     $id = $_GET['id'];

//     $sql = "DELETE FROM bookinfo WHERE sno = $id";
//     $result = $model->conn->query($sql);
//     if ($result) {
//         $delete = true;
//     } else {
//         echo "We could not update the record successfully";
//     }
// }


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


    <title>Books Information</title>

</head>

<body>


    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php
                // $model = new Model();
                // $update = $model->update();
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="book_name">Book Name</label>
                            <input type="text" class="form-control" id="book_nameEdit" name="book_nameEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <!-- <div class="form-group">
                            <label for="iimage_fileEdit">Book Image</label>
                            <input type="file" class="form-control" accept="image/*" name="image_fileEdit"
                                id="image_fileEdit">
                    </div> -->
                        <div class="form-group">
                            <label for="borrow_date">Borrow Date</label>
                            <input type="date" class="form-control" id="borrow_dateEdit" name="borrow_dateEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="return_date">Return-date</label>
                            <input type="date" class="form-control" id="return_dateEdit" name="return_dateEdit"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="student_name">Student Name</label>
                            <input type="text" class="form-control" id="student_nameEdit" name="student_nameEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="student_name">Member Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="member_typeEdit" id="member_typeEdit"
                                    value="Monthly">
                                <label class="form-check-label" for="member_type">
                                    Monthly
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="member_typeEdit" id="member_typeEdit"
                                    value="Yearly" checked>
                                <label class="form-check-label" for="member_type">
                                    Yearly
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-select" name="academic_classEdit" aria-label="Default select example">
                                <option selected>Academic Class</option>
                                <option value="Class 5">Class 5</option>
                                <option value="class 6">class 6</option>
                                <option value="class 7">class 7</option>
                                <option value="class 8">class 8</option>
                                <option value="class 9">class 9</option>
                                <option value="class 10">class 10</option>
                                <option value="class 11">class 11</option>
                                <option value="class 12">class 12</option>
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update-btn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="/crud/logo.svg" height="28px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>

            </ul>

        </div>
    </nav>

    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your book record has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your book record has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your book record has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>

    <div class="container my-4">


        <h2>Add A Book Information</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="book_name">Book Name</label>
                <input type="text" class="form-control" id="book_name" name="book_name" aria-describedby="emailHelp"
                    required>
            </div>

            <div class="form-group">
                <label for="image_file">Book Image</label>
                <input type="file" class="form-control" accept="image/*" name="image_file" id="image_file" required>
            </div>
            <div class="form-group">
                <label for="borrow_date">Borrow Date</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date" aria-describedby="emailHelp"
                    required>
            </div>
            <div class="form-group">
                <label for="return_date">Return-date</label>
                <input type="date" class="form-control" id="return_date" name="return_date" aria-describedby="emailHelp"
                    required>
            </div>
            <div class="form-group">
                <label for="student_name">Student Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name"
                    aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="student_name">Member Type</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="member_type" id="member_type" value="Monthly"
                        required>
                    <label class="form-check-label" for="member_type">
                        Monthly
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="member_type" id="member_type" value="Yearly"
                        checked required>
                    <label class="form-check-label" for="member_type">
                        Yearly
                    </label>
                </div>
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <select class="form-select" name="academic_class" aria-label="Default select example" required>
                    <option selected>academic class</option>
                    <option value="5">Class 5</option>
                    <option value="6">class 6</option>
                    <option value="7">class 7</option>
                    <option value="8">class 8</option>
                    <option value="9">class 9</option>
                    <option value="10">class 10</option>
                    <option value="11">class 11</option>
                    <option value="12">class 12</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Book Record</button>
        </form>
    </div>

    <div class="container my-4">


        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Book Image</th>
                    <th scope="col">Borrow Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Member Type</th>
                    <th scope="col">Decscription</th>
                    <th scope="col">Academic Class</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $model = new Model();
                $rows = $model->fetch();
                
                $sno = 0;

                foreach ($rows as $row) {
                    $sno = $sno + 1;

                ?>
                <tr>


                    <th scope='row'><?php echo $sno; ?></th>
                    <td><?php echo $row['book_name']; ?></td>
                    <td><img src="<?php echo $row['image_file']; ?>" width="100" height="100" alt="" srcset="">
                    </td>
                    <td><?php echo $row['borrow_date']; ?></td>
                    <td><?php echo $row['return_date']; ?></td>
                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['member_type']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['academic_class']; ?></td>

                    <td> <a href="delete.php?id=<?php echo $row['sno']; ?>" class="badge badge-danger">Delete</a>
                        <?php echo "<button class='edit badge badge-danger' id=" . $row['sno'] . ">Edit</button>";
                            ?>
                    </td>
                </tr>
                <?php
                }

                ?>


            </tbody>
        </table>
    </div>
    <hr>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;
            book_name = tr.getElementsByTagName("td")[0].innerText;
            image_file = tr.getElementsByTagName("td")[1].innerText;
            borrow_date = tr.getElementsByTagName("td")[2].innerText;
            return_date = tr.getElementsByTagName("td")[3].innerText;
            student_name = tr.getElementsByTagName("td")[4].innerText;
            member_type = tr.getElementsByTagName("td")[5].innerText;
            description = tr.getElementsByTagName("td")[6].innerText;
            academic_class = tr.getElementsByTagName("td")[7].innerText;

            book_nameEdit.value = book_name;
            // image_fileEdit.value = image_file;
            borrow_dateEdit.value = borrow_date;
            return_dateEdit.value = return_date;
            student_nameEdit.value = student_name;
            member_typeEdit.value = member_type;
            descriptionEdit.value = description;
            academic_classEdit = academic_class;
            snoEdit.value = e.target.id;
            console.log(e.target.id)

            $('#editModal').modal('toggle');

        })
    })
    </script>
</body>

</html>