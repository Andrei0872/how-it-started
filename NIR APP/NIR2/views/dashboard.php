<!-- ce se poate vedea cand dam pe dashboard -->
 <div class="col-sm-12" style="margin-top:20px;">
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Furnizori</h4>
            <p style="color:red;text-align:center;" class="lead">{{nrFrn}}</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Produse</h4>
            <p style="color:red;text-align:center;" class="lead">{{nrPrd}}</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Documente facute</h4>
            <p style="color:red;text-align:center;" class="lead">{{nrDocs}}</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h5>Documentul cu plata cea mai mare : <span class="text-center text-danger">{{factura.nrDoc}}</span></h5>
            <p>Plata : <span class="text-danger">{{factura.valoareFactura}}</span></p> 
          </div>
        </div>
      </div>
    </div>