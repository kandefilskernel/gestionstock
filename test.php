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
                        <h5 class="text-center">QR Code Generator Using Ajax</h5>
                    </div>
                    <div class="card-body">
                        <form action="" class="form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="url" id="url" placeholder="any text">
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