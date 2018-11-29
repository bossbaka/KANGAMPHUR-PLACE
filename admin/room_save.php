                        <?php
                            include('../connection/db.php');
                            if (isset($_POST['roomsave'])) {

                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $price = $_POST['price'];
                                $status = $_POST['status'];

                                //image
//                               $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//                                $image_name = addslashes($_FILES['image']['name']);
  //                              $image_size = getimagesize($_FILES['image']['tmp_name']);
//
    //                            move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
      //                          $location = "upload/" . $_FILES["image"]["name"];


                                mysql_query("insert into tb_rooms (name,description,price,status)
                              values ('$name','$description','$price','$status')
                                ") or die(mysql_error());
                              
                              header('location:rooms.php');

                            }
                        ?>    