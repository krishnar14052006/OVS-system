    <?php
   
    session_start();
    if(!isset($_SESSION['userdata']))
    {
   
    header("location: ../");
         
    }
      
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red" >Not Voted </b>';
    }
    else{
        $status = '<b style="color:green" > Voted </b>';
    }

    ?>
<html>
    <head>
        <title> ONLINE VOTING SYSTEM </title>
        <link rel="stylesheet" href="#">
    </head>
    <body style="background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%);" >
        <style>
        #backbtn{
        line-height: normal;
        max-width: 100%;
        background: #fff;
        border: none;
        padding: 15px 24px;
        position: relative;

        font-size: 15px;
        border-radius: 30px;
        cursor: pointer;
        justify-content: center;
        text-align: center;
        color: black;
        float: left;
        }
        #backbtn:hover{
            box-shadow: 2px 2px 6px 4px black;
            transition: 130ms;
        }

        #logoutbtn{
        line-height: normal;
        max-width: 100%;
        background: #fff;
        border: none;
        padding: 15px 24px;
        position: relative;

        font-size: 15px;
        border-radius: 30px;
        cursor: pointer;
        justify-content: center;
        text-align: center;
        color: black;
        float: right;
        }
        #logoutbtn:hover{
            box-shadow: 2px 2px 6px 4px black;
            transition: 130ms;
        }

        #heading{
            text-align: center;
            width: 20%;
            margin-left: 40%;
            border-top-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        #heading:hover{
            box-shadow: 10px 10px 30px 10px whitesmoke;
            transition: 1s;
            background-color: red;
        }

        #profile{
            background-color: white;
            width: 30%;
            padding: 20px;
            float: left;
            border-radius: 20px;
        }
        #profile:hover{
            box-shadow: 6px 6px 8px 6px black;
            transition: 200ms;

        }
        #Group{
            background-color: white;
            width: 60%;
            padding: 20px; 
            float: right;
            border-radius: 20px;
        }
        #group:hover{
            box-shadow: 6px 4px 8px 9px black;
            transition:  200ms;

        }
        #votebtn{
        width: 100px;
        height: 30px;
        background: #0800ff;
        border: none;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: #fff;
        transition: 0.4s ease;
        float: left;
        }
        #voted{
            width: 100px;
        height: 30px;
        background:green;
        border: none;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: #fff;
        transition: 0.4s ease;
        float: left;
        }

        </style>

        <div id="allBody">
        <div id="mainSection">


    <div id="headersection">
    <a href="../uploads/index.html"><button id="backbtn">  Back</button> </a>
    <a href="../uploads/home.html"><button id="logoutbtn">Logout</button> </a> 
        <h1 id="heading"> Online voting system</h1>
        </div>
        <br>
        <hr> 
        <br><br>
          <div id="Profile">
           <center> <img src="../uploads/<?php echo $userdata['photo'] ?>"height="200" width="200"><br></center>
            <b>Name : </b> <?php echo $userdata['name']?><br><br>
            <b>Mobile : </b><?php echo $userdata['mobile']?><br><br>
            <b>Address : </b><?php echo $userdata['address']?><br><br>
            <b>Status : </b><?php echo $status ?><br><br>
         
          </div>
        <div id="Group">

        <?php 
        if($_SESSION['groupsdata'])
        {
           for($i=0;$i<count($groupsdata);$i++) 
           {
            ?>
            <div>
                <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                <b>Group Name: </b> <?php echo $groupsdata[$i]['name'] ?><br><br>
                <b>Votes: </b> <?php echo $groupsdata[$i]['votes'] ?><br><br>
                <form action="../api/vote.php" method="POST">
                    <input type="hidden" name="gvotes"value="<?php echo $groupsdata[$i]['votes'] ?>">
                    <input type="hidden" name="gid"value="<?php echo $groupsdata[$i]['id'] ?>">
                    <?php
                      if($_SESSION['userdata']['status']==0){
                    ?>
                       
                        <input type="submit" name="votebtn"value="vote" id="votebtn">
                        <?php
                        }

                      else{
                        ?>
                       
                        <button disabled type="button" name="votebtn"value="vote" id="voted">Voted</button>
                        <?php
                      }
                    ?>
                  
                </form>

            </div>
            <br>
            <hr>
            <?php
           }
        }
        else{

        }
        ?>
        </div>

    </div>       

</div>   
</body>
</html>