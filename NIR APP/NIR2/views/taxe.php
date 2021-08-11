<div class="container">
    <!-- aici setam taxele -->
    <div class="row">
        <h1 class="text-danger">de setat undeva sus, care sunt tva urile actuale!!</h1>
        <div class="well col-sm-9 col-md-8 col-md-offset-2" style="margin-top:30px;">
            <h4 class="text-center text-success">Setarea TVA-ului</h4>
            <form name="taxeForm">
                <!-- tva ul pentru produse alimentare -->
                <div class="form-group">
                    <label class="text-info" for="alimentar">TVA produse alimentare</label>
                    <input cifre type="text" id="alimentar" class="form-control" required ng-model="taxeObj.alimentar" name="alimentarInput">
                    <!-- erori pt alimentare -->
                    <ul ng-messages="taxeForm.alimentarInput.$error">
                        <li ng-message="required" ng-show="taxeForm.alimentarInput.$touched">Acest camp trebuie completat</li>
                        <li ng-message="doarCifre" ng-show="taxeForm.alimentarInput.$dirty">Doar cifre pot fi inserate!</li>
                    </ul>
                </div>
                <!-- tva ul pentru produse NON alimentare -->
                <div class="form-group">
                    <label class="text-info" for="nonAlimentar">TVA produse non-alimentare</label>
                    <input cifre required type="text" id="nonAlimentar" class="form-control" ng-model="taxeObj.nonAlimentar" name="nonAlimentarInput">
                    <ul ng-messages="taxeForm.nonAlimentarInput.$error">
                        <li ng-message="required" ng-show="taxeForm.nonAlimentarInput.$touched">Acest camp trebuie completat!</li>
                        <li ng-message="doarCifre" ng-show="taxeForm.nonAlimentarInput.$dirty">Doar cifre pot fi inserate!</li>
                    </ul>
                </div>
                <!-- butonul de submit -->
                <div class="form-group">
                    <button ng-disabled="taxeForm.$invalid" type="button" ng-click="sendTaxe()" class="btn btn-primary btn-block"><span class="lead">Trimite</span></button>
                </div>
            </form>
        </div>
    <!-- aici aratam modificarile facute -->
    <div class="row">
        <div class="col-sm-9 well col-md-8 col-md-offset-2">
            <h4 class="text-info text-left">Modificarile Recente</h4> <br>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-info">TVA Alimentare</th>
                            <th class="text-info">TVA NON-Alimentare</th>
                            <th class="text-info">Data introducerii</th>
                        </tr>
                        <tbody>
                            <tr ng-repeat="taxa in taxeArr">
                                <td>{{taxa.tva_alimentar}}&#37;</td>
                                <td>{{taxa.tva_nonalimentar}}&#37;</td>
                                <td>{{taxa.dataInserare}}</td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>