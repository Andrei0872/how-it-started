<div class="container" style="margin-top:30px;">
    <div class="row">
        <h3 class="text-danger">inca nu este gata </h3>
        <div class="col-sm-12 well">
            <h3 class="text-info text-left mb-1">Documentele existente</h3>
            <!-- aici punem tabelul cu documentele -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nr. Document</th>
                            <th>Data Facturii </th>
                            <th>Furnizor</th>
                            <th>Nr. Produse</th>
                            <th>PDF</th>
                            <th>Editeaza</th>
                            <th>Sterge</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="doc in documente">
                            <td>{{doc.nrDocument}}</td>
                            <td>{{doc.dataInserare}}</td>
                            <td>{{doc.numeFurnizor}}</td>
                            <td>{{doc.nrProduse}}</td>
                            <td><a class="text-warning" href="#/pdf/{{doc.nrDocument}}">PDF</a></td>
                            <td><a class="text-success" href="#/update/{{doc.nrDocument}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td><a class="text-danger" href="javascript:void(0)" id="{{doc.nrDocument}}"><span class="glyphicon glyphicon-remove"></span></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>