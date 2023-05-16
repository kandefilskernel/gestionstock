<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator Using Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <!-- QR Code Form -->
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">NOUVEL ETUDIANT</h5>
                    </div>
                    <div class="card-body">
                        <form action="" class="form">
                            <div class="form-group-inline">
                                <input type="text" class="form-control" name="T"  placeholder="Veuillez saisir le nom complet">
                               
                                <input type="text" class="form-control" name="T4"  placeholder="Veuillez saisir le numero Tél">
                                <input type="text" class="form-control" name="T5"  value="2020-2021">
                                <input type="text" class="form-control" name="T4"  placeholder="Veuillez saisir le numero Tél"><input type="file" name="photo"  class="form-control"/>
                            </div>
                          
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Informatique
                                  </label>
                                </div>
                                 <div class="form-check-inline">
                                      <label class="form-check-label">
                                       <input type="radio" class="form-check-input" name="optradio">Scofi
                                         </label>
                                 </div>
                                   <div class="form-check-inline disabled">
                                      <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio" disabled>Douane
                                            </label>
                                   </div>
                                   <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Genie
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Esthetique
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Modelisme
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">TH
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">GRHT
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">RT
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">IG
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Electro-mecanique
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Electricite
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Conception
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Comptabilité
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Mark
                                  </label>
                                </div>
                                <div class="form-check-inline">
                                  <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="optradio">Chimie
                                  </label>
                                </div>
                            <button class="btn btn-primary btn-block">QR Code Generator</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /QR Code Form -->

        <!-- QR Code Wrapper-->
        <div class="row mt-2">
            <div class="col-lg-6 offset-lg-3">
                <div class="status"></div>
                <div id="d-qrcode" class="d-none text-center">
                </div>
                <div class="box mt-2 d-none text-center">
                    <a href="#" class="btn btn-info" id="show" download>Download QR Code</a>
                </div>
            </div>
        </div>
        <!-- /QR Code Wrapper -->

    </div>

    <!-- QR Code Javascript library -->
    <script src="asset/qrcode.min.js"></script>
    <!-- /QR Code Javascript library -->
    <script src="asset/script.js"></script>
</body>

</html>