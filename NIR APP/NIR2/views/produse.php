
<div class="container" style="margin-top:12px;">
    <!-- aici definim produsele -->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 well">
            <h3 class="text-center"> Definirea Produsului</h3>
            <form name="myForm" id="produseForm">
                <!-- numele produsului -->
                <div class="form-group"> 
                    <div class="input-group">
                        <span class="input-group-addon">Numele produsului</span>
                        <input type="text" ng-model="objProd.produs" data-ng-maxlength="60" name="numeProdus" class="form-control" required>
                    </div>
                    <ul ng-messages="myForm.numeProdus.$error">
                        <li ng-message="required" ng-show="myForm.numeProdus.$touched">Acest camp trebuie completat!</li>
                        <li ng-message="maxlength" ng-show="myForm.numeProdus.$dirty">Nu mai mult de 60 de caractere!</li>
                    </ul>
                </div>
                <!-- ce tip de produs este  -->
                <!-- o sa avem n iste inline radio btns -->
                <div id="radioContainer">
                    <p>Tipul Produsului</p>
                    <label class="radio inline"> 
                        <input type="radio" name="tipProdus" value="alimentar" checked>
                        <span> Alimentar </span> 
                    </label>
                    <label class="radio inline"> 
                        <input type="radio" name="tipProdus" value="nonalimentar">
                        <span>Non-alimentar </span> 
                    </label>
                </div>
                    <!-- adaos -->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Adaos</span>
                            <input type="text" class="form-control" name="adaosInput" ng-model="objProd.theAdaos" required cifre >
                        </div>
                        <ul ng-messages="myForm.adaosInput.$error">
                            <li ng-message="required" ng-show="myForm.adaosInput.$touched">Acest camp trebuie completat!</li>
                            <li ng-message="doarCifre" ng-show="myForm.adaosInput.$dirty">Inserati un numar!</li>
                        </ul>
                    </div>
                        
                    <!-- butonul de submit  -->
                    <!-- clasa send - pt a selecta mai usor -->
                    <input type="button" ng-click="inserareProdus()" ng-disabled="myForm.$invalid" class="btn btn-info btn-block send" style="width:50%;margin:0 auto;" value="Trimite">
            </form>
        </div>
    </div>
    <!-- afisam ce avem -->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 well">
            <h4 class="text-left text-primary">Produsele existente : {{produse.length}}</h4>
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="text-center text-primary">Nume Produs</th>
                            <th class="text-center text-primary">Adaos Produs</th>
                            <th class="text-center text-primary">Valoare Adaos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="produs in produse">
                            <td>{{produs.nume}}</td>
                            <td class="text-warning">{{produs.tip}}</td>
                            <td>{{produs.valoareAdaos}} lei</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
