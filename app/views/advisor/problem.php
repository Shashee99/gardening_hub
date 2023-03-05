<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/problem.css">
    <title>Document</title>
    <style>
        body {

margin: 0%;
padding: 0%;




}


.head {

width: 100vw;
height: 20vh;
background-image: linear-gradient(to right, #00A778, #62B264);


}

.sider {

width: 100%;
height: 80vh;
background-color: cadetblue;
display: flex;


}

.sidleft {

margin-left: 0%;
width: 30%;
height: 100%;
background-color: #EFEFEF;


}

.sidright {
width: 100%;
height: 100%;
background-color: hsla(146, 53%, 94%, 0.875);
overflow:scroll;





}

.head ul {
list-style-type: none;
margin-top: 3%;
padding: 0;
margin-left: 20%;
overflow: hidden;

}

.head li {
float: left;
}

.head li a {
display: block;
color: rgb(12, 11, 11);
text-align: center;
font-size: x-large;
font-style: Source Sans 3;
padding: 35px;
text-decoration: none;
}

.head li a:hover {
background-color: rgb(107, 209, 149);


}

.head {

display: flex;

}

.head img {
position: absolute;

margin-left: 10%;
margin-top: 2%;


}

.profile {

width: 100%;
height: 15%;

display: flex;

}

.profile img {

width: 80px;
height: 80px;
margin-top: 3%;
margin-left: 5%;
border-radius: 50%;
background-color: #62B264;

}

.profile p {

font-size: x-large;
font-style: italic;
margin-top: 7%;
margin-left: 7%;

}
a{
text-decoration: none !important;
}
.profile div {

width: 20px;
margin-top: 14%;
margin-left: -7%;
height: 20px;
border-radius: 50%;
background-color: #1c361b;

}

.function {

width: 90%;
height: 12%;
margin-top: 5%;
margin-left: 5%;
border: 2px solid rgb(103, 206, 144);
border-radius: 10px;
display: flex;

}

.function:hover {
background-color: rgb(103, 206, 144);


}

.c {
font-size: x-large;

font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
color: rgb(5, 5, 5);
margin-left: 5%;

}

.function img {

width: 45px;
height: 45px;
margin-left: 40%;
margin-top: 8%;
color: black;

}

.a {

font-size: 25px;
margin-left: 5%;
font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
color: rgb(5, 5, 5);

}

/* user problem part center */
.problem-div-right {

width: 50%;
height: 100%;
background-color: #6ce470;
display: flex;
margin-bottom: 20px;


}

/* user problem div */

.problem-div {

width: 80%;
height: 70%;
margin-left: 9%;
margin-top: 7%;
border-radius: 10px;
background-color: #72c86f;
position: relative;


}

/* coustemr imge */
.problem-user-profile-imge {
margin-top: 20px;
width: 80px;
height: 80px;

margin-left: 3%;
border-radius: 50%;
overflow: hidden;
background-color: #EFEFEF;
display: inline-block;


}

.problem-user-profile-imge img {

width: 100%;
height: 100%;

}

/* user problem mzg center */
.user-problem-disply {
width: 96%;
height: 60%;
margin-left: 2%;
margin-top: 1%;
border-radius: 10px;
background-color: white;




}

.problem-reply-buttun {

width: 200px;
height: 50px;
margin-top: 2%;
margin-left: 40%;
border-radius: 15px;
background-color:#90caff;
font-size: x-large;
color:black;
border: none;


}

.problem-reply-buttun:hover {
background-color: #76807d;

}

.time-date-problem {
display: flex;

}

.time-date-problem h5 {


padding-left: 10px;
margin-top: 4%;
font-size: 18px;


}
    </style>
    

</head>
<body>
<div class="contener">
    <div class="head">
        <div><img src="../image/logo.png" alt="mylogo"></div>
            <ul >
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contect us</a></li>
            </ul>
    </div>
    <div class="sider">
        <div class="sidleft">
            <div class="profile">
                <img src="../image/logo.png" alt="image" >
                    <p>Dasith chanuka <br>Active now </p> <div> </div> 
            </div>

            <a href="http://localhost/UI_project/index.php"><div class="function"><p class="c">Dashbord</p></div></a>
            <a href="http://localhost/UI_project/advisor/problem.php"><div class="function"><p class="a">Customer Problems</p></div></a>
            <a href="http://localhost/UI_project/advisor/addtechnology.php"><div class="function"><p class="a">Add New Technology</p></div></a>
            <div class="function"><p class="c">Log out</p></div>
            <div class="function"><p class="c">View Generate Report</p></div>

        </div>
           <div class="sidright">
                 
                        <div class="problem-div">
                                 <div class="time-date-problem">
                                
                                    <div class="problem-user-profile-imge"> 
                                        <img src="../image/logo.png" alt="">

                                    </div>

                                    
                                    <h5>  Time:23:20 /</h5>
                                    <h5>2023-01-03</h5>

                                </div>
                            
                                <div class="user-problem-disply">
                                  
                            

                                 </div>

                                 <!-- <div class="problem-reply-buttun"><p>reply</p></div> -->
                                <button class="problem-reply-buttun">Reply</button>


                         </div>

                         <div class="problem-div">
                                 <div class="time-date-problem">
                                
                                    <div class="problem-user-profile-imge"> 
                                        <img src="../image/logo.png" alt="">

                                    </div>

                                    
                                    <h5>  Time:23:20 /</h5>
                                    <h5>2023-01-03</h5>

                                </div>
                            
                                <div class="user-problem-disply">
                                  
                            

                                 </div>

                                 <!-- <div class="problem-reply-buttun"><p>reply</p></div> -->
                                <button class="problem-reply-buttun">Reply</button>


                            </div>

                    


            </div>

    </div>
 

</div>




</body>
</html>