<div class="panel-body">
    <!--User Login Form-->
    <form onsubmit="return false" id="login">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" required/>
        <label for="email">Password</label>
        <input type="password" class="form-control" name="password" id="password" required/>
        <p><br/></p>
        <input type="submit" class="btn btn-success" style="float:right;" Value="Login">
        <!--If user dont have an account then he/she will click on create account button-->
        <div class="create_new_account"><a href="customer_registration.php?register=1">Create a new account?</a></div>						
    </form>
</div>