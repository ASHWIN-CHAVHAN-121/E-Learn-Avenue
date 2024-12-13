<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Success</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
    html,
    body {
        height: 90%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .center {
        text-align: center;
    }

    .center img {
        display: inline-block;
    }

    .container {
        width: 100%;

    }

    .alert {
        width: 100%;

    }
    </style>
</head>

<body>

    <form id="paymentForm">
        <div class="container">
            <div class="row">

                <div class="col-sm-12" style="border: solid black 2px;">
                    <br>
                    <div class="center">
                        <img src="images/right_tick.jpg" width="18%" height="100px">
                        <br>
                        <h2>Payment has been Successful</h2>
                    </div>
                    <hr style=" border: 2px solid darkgoldenrod;">
                    <div class="alert alert-success">
                        <h4 style="text-align: center;"><strong>Please note your Payment id!</strong></h4>
                        <br><br>
                        <label>Payment Id :</label> <strong><span
                                id="paymentId"><?php echo $_SESSION['paymentid'];?></span></strong>
                        <br><br>
                        <label>Amount :</label> <strong><span
                                id="amount"><?php echo $_SESSION['amount'];?></span>/-</strong>
                        <br><br>
                        <label>Course Title :</label> <strong><span
                                id="title"><?php echo $_SESSION['title'];?></span></strong>
                        <br><br>
                        <label>Paid To :</label> <strong>E-Learn Avenue</strong>
                        <br><br>
                        <label for="datetime">Paid On :</label>
                        <strong><span id="datetime"></span></strong>
                        <br><br><br>
                        <button class="btn btn-success hidden-print" onclick="print()"><span
                                class="glyphicon glyphicon-cloud-download"></span> Download Receipt</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- code for date and time -->
    <script>
    function displayDateTime() {
        const currentDate = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric'
        };
        const formattedDateTime = currentDate.toLocaleDateString('en-US', options);
        document.getElementById('datetime').textContent = formattedDateTime;
    }

    // Call the function to display date and time initially
    displayDateTime();

    // Update date and time every second
    setInterval(displayDateTime, 1000);
    </script>


    <!-- code for download button -->

    <!-- JavaScript code -->
    <!-- <script>
function downloadReceipt() {
    try {
        console.log("Download button clicked"); // Check if the function is called

        // Get the payment information
        const paymentId = document.getElementById('paymentId').innerText;
        const amount = document.getElementById('amount').innerText;
        const paidOn = document.getElementById('datetime').innerText;

        // Create a new jsPDF instance
        const pdf = new jsPDF();

        // Set font size and style
        pdf.setFontSize(12);

        // Add content to the PDF
        pdf.text(Payment Receipt, 20, 20);
        pdf.text(Payment ID: ${paymentId}, 20, 30);
        pdf.text(Amount: ${amount}, 20, 40);
        pdf.text(Paid To: E-Learn Avenue, 20, 50);
        pdf.text(Paid On: ${paidOn}, 20, 60);

        // Download the PDF
        pdf.save('receipt.pdf');
    } catch (error) {
        console.error("Error creating PDF:", error); // Log any errors
    }
}
</script> -->


</body>

</html>