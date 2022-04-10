<?php
session_start();
 include_once "config.php";
 $fname = mysqli_real_escape_string($conn,$_POST['fname']);
 $lname = mysqli_real_escape_string($conn,$_POST['lname']);
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = mysqli_real_escape_string($conn,$_POST['password']);
 $dob = mysqli_real_escape_string($conn,$_POST['dob']);

 if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($dob)){
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT email From users Where email ='{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email - email already exist!";
        }else{
            if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);

                $extension = ['png','jpg','jpeg'];

                if(in_array($img_ext,$extension) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                        $status ="Active";
                        $random_id = rand(time(),10000000); //creating random id for users
                        $sql2 = mysqli_query($conn,"INSERT INTO users (unique_id,fname,lname,email,password,dob,img,status)
                            VALUES({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$dob}','{$new_img_name}','{$status}')");
                        if($sql2){
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql3) > 0){
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo"Success";
                            }
                        }else{
                            echo "Something went wrong!";
                        }
                    }
                }else{
                    echo"please select only jpg , jpeg or in png format";
                }
            }else{
                echo "please select an Image file ";
            }
        }
    }else{
        echo "$email - This is not a valid mail id";
    }
 }else{
     echo "All input field are required";
 }
?>