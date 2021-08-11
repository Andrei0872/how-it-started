<div class="container" ng-app="myApp" > 
    <h3>trebuie implementata si o cautare, si o paginatie</h3>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-9"  style="margin-top:30px;">
                <div class="well text-center">
                    <h3>Adaugarea unui furnizor nou</h3>
                    <form name="myForm">
                        <!-- nume -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="text-danger">Nume Furnizor</span></span>
                                <input autocomplete="off" name="myName" data-ng-maxlength="50" data-ng-minlength="4" ng-model="formObj.denumire" type="text" class="form-control" required>
                            </div>
                            <!-- erori pt nume -->
                            <ul ng-messages="myForm.myName.$error">
                                <li class="errori"  ng-message="required" ng-show="myForm.myName.$touched">Acest camp trebuie completat</li>
                                <li class="errori"  ng-message="minlength" ng-show="myForm.myName.$dirty">Minim 4 caractere!</li>
                                <li class="errori"  ng-message="maxlength" ng-show="myForm.myName.$dirty">Maxim 50 de caractere!</li>
                            </ul>
                        </div>
                        <!-- adresa -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon "><span class="text-danger">Adresa</span></span>
                                <input autocomplete="off" name="myAddr" ng-model="formObj.adresa" type="text" class="form-control" required>
                            </div>
                            <!-- erori pentru adresa  -->
                            <ul ng-messages="myForm.myAddr.$error">
                                <li class="errori" style="margin-top:7px;" ng-message="required" ng-show="myForm.myAddr.$touched">Acest camp trebuie completat</li>
                            </ul>
                        </div>
                        <!-- cui -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="text-danger">CUI</span></span>
                                <input autocomplete="off" digits name="myCui" ng-model="formObj.cui" type="text" class="form-control" required>
                            </div>
                            <!-- erori pentru CUI  -->
                            <ul ng-messages="myForm.myCui.$error">
                                <li class="errori" ng-message="required" ng-show="myForm.myCui.$touched">Acest camp trebuie completat</li>
                                <li class="errori" ng-message="nrDigits" ng-show="myForm.myCui.$dirty">Trebuie intre 7 si 9 cifre!</li>
                            </ul>
                        </div>
                        <!-- butonul de submit  -->
                        <div class="form-group">
                            <button ng-disabled="myForm.$invalid" type="button" ng-click="sendInf()" class="btn btn-primary btn-block"><span class="lead">Trimite</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- afisam toti furnizorii -->
        <!-- punem tabelul intr un div pt a fi responsive-->
        <div class="row">
            <div class="col-sm-9  col-md-8 col-md-offset-2">
                <div ng-show="furnizori.length !=0" class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Denumire</th>
                            <th>Adresa</th>
                            <th>CUI</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="furn in furnizori">
                                <td>{{furn.denumireFurn}}</td>
                                <td>{{furn.adresaFurn}}</td>
                                <td>{{furn.cuiFurn}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!--end of container -->
     