<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD APP PDO OOP</title>
  </head>
  <body>

    <!-- Add New User Modal Start -->
    <div class="modal fade" tabindex="-1" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-header">เพิ่มผู้ใช้ใหม่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate>
                        <div class="row mb-3 gx-3">
                            <div class="mb-3">
                                <input type="text" name="email"  class="form-control form-control-lg" placeholder="Enter E-mail" required>
                                <div class="invalid-feedback">E-mail is required!</div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <input type="text" name="citizenid"  class="form-control form-control-lg" maxlength="13" placeholder="Enter Citizen ID" required>
                                    <div class="invalid-feedback">Citizen ID is required!</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <input type="text" name="fname"  class="form-control form-control-lg" placeholder="Enter First Name" required>
                                    <div class="invalid-feedback">First name is required!</div>
                                </div>
                                <div class="col">
                                    <input type="text" name="lname"  class="form-control form-control-lg" placeholder="Enter Last Name" required>
                                    <div class="invalid-feedback">Last name is required!</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="sex"  class="form-control form-control-lg" placeholder="Enter M or F">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="phone"  class="form-control form-control-lg" placeholder="Enter Phone">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New User Modal End -->

    <!-- Edit User Modal Start -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-header">แก้ไขข้อมูลผู้ใช้</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" class="p-2" novalidate>
                        <div class="row mb-3 gx-3">
                            <input type="hidden" name="id" id="id">
                            <div class="mb-3">
                                <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
                                <div class="invalid-feedback">E-mail is required!</div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <input type="text" name="fname" id="fname"  class="form-control form-control-lg" placeholder="Enter First Name" required>
                                    <div class="invalid-feedback">First name is required!</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                                    <div class="invalid-feedback">Last name is required!</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="sex" id="sex" class="form-control form-control-lg" placeholder="Enter M or F">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="แก้ไขข้อมูลผู้ใช้" class="btn btn-primary btn-block btn-lg" id="edit-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal End -->

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-primary">All users in the database</h4>
                </div>
                <div>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addNewUserModal">เพิ่มผู้ใช้ใหม่</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-boredered text-center">
                        <thead>
                            <tr>
                                <th>เลขบัตรประชาชน</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เพศ</th>
                                <th>E-mail</th>
                                <th>เบอร์มือถือ</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="main.js"></script>

  </body>
</html>
