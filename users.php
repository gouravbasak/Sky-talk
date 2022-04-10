<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location: ../login.php");
}
?>
<?php include_once "header.php";
?>
<body class="bodybg">
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                include_once "backend/config.php";
                $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id ={$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                <!-- fetching data from server -->
                    <img src="backend/images/<?php echo $row['img'] ?>" alt=""> 
                    <div class="details">
                        <span><?php echo $row['fname'] ." ".$row['lname'] ?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
                <a href="backend/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select someone for chatting</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="users-list">
                <!-- users will show here -->
            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>