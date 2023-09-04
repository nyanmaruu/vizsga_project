<?php session_start(); ?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./successfullyPaymentCss.css">

</head>

<body>
    <div class="card">
        <!-- <p>You will be redirected in <time><strong id="seconds">3</strong> seconds</time>.</p> -->
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <p>Thank you for your order!</p>
        <a href="../index.php" class="btn btn-dark mt-2">Back to frontpage</a>
    </div>
</body>

<script src="./successfullyPaymentJs.js"></script>