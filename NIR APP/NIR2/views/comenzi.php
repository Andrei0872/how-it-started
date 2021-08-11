<div class="container" style="margin-top:30px;">
    <h1>trebuie implementata navigarea prin sageti</h1>
        <h4>  Produsul Nr.1</h4>
        <div class="row">
            <div class="well col-sm-9 col-md-8 col-md-offset-2">
                <div class="row">
                    <div class=" col-sm-6 col-md-6 text-center ">
                        <!-- crearea unui produs -->
                       <h4>Alegerea unui Produs</h4>
                        <form name="myForm">
                            <!-- nume produs -->
                            <div class="form-group">
                                <div class="input-group"> 
                                    <span class="input-group-addon small"> Nume</span>
                                    <!-- transmitem prin parametru acest specific element -->
                                    <input  ng-keyup="completare($event)"  autocomplete="off"  type="text" class="denumire test form-control" name="myName1"  ng-model="And.nume1"  required> 
                                </div>
                                <!-- afisam posibilele erori -->
                                <ul class="erori" ng-messages="myForm.myName.$error" ng-cloak>
                                    <!-- <li ng-message="lungime">Trebuie sa aiba 6!</li> -->
                                    <li  ng-show="myForm.myName.$error.required && myForm.myName.$touched ">Acest camp trebuie completat</li>
                                </ul>
                            </div>
                            <!-- cantintate -->
                            <div class="form-group">
                                <div class="input-group"> 
                                    <span class="input-group-addon small"> Cantitate</span>
                                    <input type="text" class="cantitate test form-control" name="myCantitate1" ng-model="And.cantitate1"> 
                                </div>
                            </div>
                            <!-- pret -->
                            <div class="form-group">
                                <div class="input-group"> 
                                    <span class="input-group-addon small">Pret</span>
                                    <input type="text" ng-model="And.pret1" name="myPret1" class="pret test form-control"> 
                                </div>
                            </div>
                            <!-- Pret actual -->
                             <div class="form-group">
                                <div class="input-group"> 
                                    <span class="input-group-addon small">Pret Act.</span>
                                    <input type="text" class="tva test form-control" name="pretActual1" readonly >
                                </div>
                            </div>  
                            <span class="pentruValidare1"  style='display:none;' data-val="{{myForm.$invalid}}"></span>
                        </form>
                    </div>
                    <!-- furnizorii existenti -->
                    <div class="col-xs-12 col-sm-6 col-md-6 text-center">
                        <h4>Furnizori existenti</h4>
                        <select name="mySelect" class="selectpicker" style="width:100%;border:none;border-radius:5px;height:35px;">
                            <option id="default" value="">Selectati furnizor</option>
                            <option ng-repeat="furn1 in furnizori" value="{{furn1.id}}" >{{furn1.denumireFurn}}</option>
                        </select>
                        
                        <!-- fac cele 3 butoane, add , send si trimitere la pag anterioara -->
                        <div class="row" style="margin:10px;">
                            <!-- butonul de add -->
                            <div class="col-md-12 col-sm-12">
                                <button type="button" my-add class="btn btn-success add btn-block text-center">Adauga Fisa</button>
                            </div>
                            <!-- butonul de trimitere in index -->
                            <div class="col-md-12 col-sm-12" style="margin-top:10px;">
                                <a href="index.php"  class="btn btn-danger  btn-block text-center">Pagina Principala</span></a>
                            </div>
                            <!-- butonul de send -->
                            <div class="col-sm-12 col-sm-12" style="margin-top:10px;">
                                <button  ng-disabled="myForm.$invalid" id="uniq" type="button" ng-click="sendDocument()"  class="btn  btn-primary send  btn-block text-center">Trimite</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- div ul ce va contine celalte fise -->
    <div id="fise"></div>