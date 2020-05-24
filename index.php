
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container" style="padding: 10rem;">
<h1 class="display-3">All Users</h1>

<table class="table ">
    <thead>
    <tr>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        <th scope="col">Country</th>
        <th scope="col">gif</th>
    </tr>
    </thead>
    <tbody id="bodyUsers">

    </tbody>
</table>
    <h2>add New User</h2>
    <form >
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <span id = 'emailError' style="color: red"></span>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">phone</label>
            <input type="text" name ='phone' class="form-control" id="phone" placeholder="Phone">
            <span id = 'phoneError' style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Ip</label>
            <input id="ip" type="text" name ='ip' class="form-control"  placeholder="ip">
            <span id = 'ipError' style="color: red"></span>
            <input id = 'token' type="hidden" name ='token' value="<?php print_r(bin2hex(random_bytes(16))); ?>" >
        </div>
        <button id="submit" type="submit" name="submit"  class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="getDataByAjax.js"></script>

</body>
</html>
