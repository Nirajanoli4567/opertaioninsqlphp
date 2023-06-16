<?php 

include("conn.php");


$id=$_GET['id'];

$sql="SELECT * FROM NIRAJAN WHERE id=$id";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
//filling data in the field\

$namee=$data['name'];
$p=$data['password'];
$e=$data['email'];
 if(isset($_POST['update']))
 {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];

  $query= "UPDATE NIRAJAN SET id=$id,name='$name',password='$password',email='$email'
  WHERE id=$id";

  $data =mysqli_query($conn,$query);


  if($data)
  {
    header('location:display.php');
    // echo "updated";
  }
  else{
    echo "not updated";
  }

 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
       .container

       {
        width: 100%;
        height: 100vh;
        background: url('Usign-Gradients-Featured-Image.jpg.webp') no-repeat;
        background-size: cover;
       }
       .box{
         position: relative;
         width: 380px;
         border: 1px solid red;
         top: 50%;
         left: 50%;
         transform: translate(-50%,-50%);
         box-shadow: 8px 8px 12px #e7dcdc;
         padding: 20px;
       }
       .head h2
       {
        color: white;
        font-weight: 600;
        text-align: center;
        margin: 10px;
        font-size: 40px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
       }
       .body{
        padding: 10px;
       }
       label
       {
        font-size: 20px;
        color: white;
        font-weight: 300;
       }
       input
       {
        width: 100%;
        padding: 8px;
        border: none;
        border-radius: 10px;
        margin: 6px;
       }
       #submitbtn
       {
        font-size: 20px;
        text-align: center;
       }
       #submitbtn:hover
       {
       background: blue;
       color: #e7dcdc;
       }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <header class="head">
                <h2>UPDATE TABLE</h2>
            </header>
            <form method="post">
            <main class="body">
                <p>
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $namee?>">
                    <span id="nameerror"></span>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="<?php echo $p?>">
                    <span id="passworderror"></span>
                </p>
                
                <p>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $e?>">
                    <span id="emailerror"></span>
                </p>
                <p>
                    <input type="submit" id="submitbtn" name="update" value="UPDATE THE VALUE">
                </p>
            </main>
            </form>
            <footer class="foot">
                <p style="color:white">Already have an account?<a href="#">  Login</a></p>
            </footer>
        </div>
    </div>
</body>
<script>
    const nameerror=document.getElementById('nameerror');
    const passworderror=document.getElementById('passworderror');
    const cpassworderror=document.getElementById('cpassworderror');
    const emailerror=document.getElementById('emailerror');
    const submitbtn=document.getElementById('submitbtn');

    submitbtn.addEventListener('click',(e)=>
    {
           if(validatename()&&validatepassword()&&validatecpassword()&&validateemail())
           {
            alert (" Account is created  successfully");
           }
           else
           {
            e.preventDefault();
           }
    })

    function validatename()
    {
        let name=document.getElementById('name').value;

        if(name.length==0)
        {
            nameerror.innerHTML="Name is required";
            return false;
        }
        if(!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/))
        {
            nameerror.innerHTML=" Enter your full name";
            return false;
        }
        nameerror.innerHTML="";
        return true;
    }
    function validatepassword()
    {
        let password=document.getElementById('password').value;

        if(password.length==0)
        {
            passworderror.innerHTML="password is required";
            return false;
        }
        if(!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,30}$/))
        {
            passworderror.innerHTML=" 1 uppercase 1 lowercase 1 number 1 sybmol must be there";
            return false;
        }
        passworderror.innerHTML="";
        return true;
    }
    function validatecpassword()
    {
        let cpassword=document.getElementById('cpassword').value;
        let password =document.getElementById('password').value;

        if(cpassword.length==0)
        {
            cpassworderror.innerHTML="password is required";
            return false;
        }
        if(!cpassword==password)
        {
            passworderror.innerHTML="Pasword didnot match";
            return false;
        }
        cpassworderror.innerHTML="";
        return true;
    }

    function validateemail()

    {
        let email=document.getElementById('email').value;

        if(email.length==0)
        {
            emailerror.innerHTML="Email is required";
            return false;
        }
        if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
        {
            emailerror.innerHTML="email must contain @ and numver";
            return false;
        }
        emailerror.innerHTML="";
        return true;
    }


</script>
</html>