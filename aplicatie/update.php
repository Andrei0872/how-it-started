<?php
    include_once("db/Crud.php");
    $crud = new Crud();
    $nr = $crud -> escape_string($_GET['id']);

            $result = $crud -> getData("SELECT * FROM `friends` WHERE `id` =$nr");
    foreach($result as $res){
        $unu = ($res['name']);
        $doi = ($res['email']);
        $trei = ($res['mobile']);
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Friend</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <style>.centrat{margin:0 auto; max-width:900px;}</style>
    </head>
    <body>
        <div class="container centrat">
            <h3>
                Update friend 
                <?php
                    echo $nr;
                ?>
            </h3>
            <form ng-app="myApp" ng-controller="validateCtrl" name="myForm" novalidate action="upd.php" method="post">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="name">NEW Friend NAME</label><input type="hidden" name="id" value="<?php  echo $nr; ?>">
                        <input class="form-control" id="name" name="name" type="text" ng-model="friend" required value="<?php echo $unu; ?>">
                        <span class="text-danger" ng-show="myForm.friend.$dirty && myForm.friend.$invalid">
                            <span ng-show="myForm.friend.$error.required">Friend name is required!</span></span>
                    </div>
                    <div class="col-sm-4">
                        <label for="email">NEW Friend EMAIL</label>
                        <input class="form-control" id="email" name="email" ng-model="email" type="email" required value="<?php echo $doi; ?>">
                        <span class="text-danger" ng-show="myForm.email.$dirty && myForm.email.$invalid">
                            <span ng-show="myForm.email.$error.required">Email is required!</span>
                            <span ng-show="myForm.email.$error.email">Invalid email address.</span>
                        </span>
                    </div>
                    <div class="col-sm-3">
                        <label for="phone">NEW Friend Phone</label>
                        <input class="form-control" id="phone" name="mobile" ng-model="phone" type="text" required value="<?php echo $trei; ?>">
                        <span class="text-danger" ng-show="myForm.phone.$dirty && myForm.phone.$invalid"></span>
                    </div>
                </div>
                <input type="submit" name="update" value="Update" class="btn btn-success" ng-disabled="myForm.friend.$dirty && myForm.friend.$invalid || myForm.phone.$dirty && myForm.phone.$invalid || myForm.email.$dirty && myForm.email.$invalid">
                <button class="btn btn-warning" style="float:right; margin-right:17%"><a href="index.php" style="text-decoration:none;">Intoarcere la pagina principala</a></button>
            </form>
            
          <script>
              var app = angular.module('myApp', []);
              app.controller('validateCtrl', function($scope) {
                  $scope.friend = '<?php echo $unu; ?>';
                  $scope.email = '<?php echo $doi; ?>';
                  $scope.phone = '<?php echo $trei; ?>';
              });
            </script>
        </div>
    </body>
</html>
