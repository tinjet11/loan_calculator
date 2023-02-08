<!doctype html>
<title></title>
<meta name="viewport" content="width=device-width">
<link href="accrue/example.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="bootstrap/bootstrap/font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div id="container">

    <div id="container">
        <div class="table-responsive-md mx-auto col-10">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Bank</th>
                        <th scope="col">Interest Rate</th>
                        <th scope="col">Last Update Since</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    require_once("include/db.php");
                    global $ConnectingDB;
                    $sql = "SELECT bank,image,rate,date  FROM bank_interest";
                    $stmt = $ConnectingDB->query($sql);
                    while ($DataRows = $stmt->fetch()) {

                        $Bank = $DataRows["bank"];
                        $Image = $DataRows["image"];
                        $Rate = $DataRows["rate"];
                        $Date = $DataRows["date"];

                    ?>
                        <tr>
                            <!-- change to the file where you put image -->
                            <th scope="col"><img class="mw-100 mh-100" src="upload/<?php echo $Image ?>">
                            
                                <p><?php echo $Bank ?></p>
                            </th>
                            <th scope="col"><?php echo $Rate ?></th>
                            <th scope="col"><?php echo $Date ?></th>
                        </tr>
                    <?php } ?>
                </tbody>
                
            </table>
        </div>
    </div>
    <div class="block grey-lighter">
        <div class="wrap">
            <figure class="chart-figure" style="float: right;">
                <p>Interest rate:</p>
                <iframe src='https://d3fy651gv2fhd3.cloudfront.net/embed/?s=malaysiabanlenrat&v=202107311007V20200908&d1=20200827&type=mean=1&h=300&w=600' height='300px' width='730px'></iframe>
            </figure>
            <div class="fifty"></div>

            <div class="calculator-amortization">
                <div class="thirty form">
                </div>


                <div class="seventy">
                    <p><label>Results:</label></p>
                    <div class="results"></div>
                </div>

                <div class="clear"></div>
            </div>


        </div>
    </div>






</div>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="accrue/jquery.accrue.min.js"></script>
<script>
    // start accrue.js
    $(document).ready(function() {
        // set up the amortization schedule calculator
        $(".calculator-amortization").accrue({
            mode: "amortization"
        });

    });


    // ------------------------------------------------
    // none of the code below is required for accrue.js
    // ------------------------------------------------

    // smooth scrollin'
    $(function() {
        var a = function(a) {
            var b = $("a[name='" + a + "']");
            "undefined" == typeof b.offset() && (b = $("#" + a)), "undefined" != typeof b.offset() && $("html, body").animate({
                scrollTop: b.offset().top
            }, 1e3)
        };
        $("a").click(function(b) {
            if ($(this).attr("href").match("#")) {
                b.preventDefault();
                var c = $(this).attr("href").replace("#", "");
                a(c)
            }
        })
    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-614793-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-614793-2');
</script>