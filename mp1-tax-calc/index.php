<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;700;900&display=swap" rel="stylesheet">
    <title>Tax Calculator</title>
</head>

<body>
    <div class="main-wrapper">
        <div class="calculator">
            <h1>A Tax Calculator</h1>

            <form action="" method="post" class="flex">

                <div class="input">
                    <h3>Salary</h3>
                    <input type="text" name="salary" id="salary" placeholder="Enter your salary here" onkeypress='validate(event)'>
                </div>

                <div class="input">
                    <h3>Type</h3>
                    <div class="radio-type">
                        <div>
                            <input type="radio" name="type" id="bimonthly" value="bimonthly" checked="checked">
                            <label for="bimonthly">Bi-Monthly</label>
                        </div>

                        <div>
                            <input type="radio" name="type" id="monthly" value="monthly">
                            <label for="monthly">Monthly</label>
                        </div>
                    </div>
                </div>


                <button type="submit" name="submit" value="submit">Compute</button>

                <?php

                $taxAnnual = 0;
                $taxMonthly = 0;

                if (isset($_POST["submit"])) {
                    $taxType = $_POST['type'];
                    $inputSalary = $_POST['salary'];
                    getTypeTax($taxType, $inputSalary);
                } else {
                }

                function getTypeTax($type, $salary)
                {
                    if ($type == 'bimonthly') {
                        $salaryBi = ($salary * 2) * 12;
                        $taxAnnual = annualComputation($salaryBi);
                        $taxMonthly = $taxAnnual / 12;
                        printTax($salaryBi, $taxAnnual, $taxMonthly);
                    } else if ($type == 'monthly') {
                        $salaryAnnual = $salary * 12;
                        $taxAnnual =  annualComputation($salaryAnnual);
                        $taxMonthly = $taxAnnual / 12;
                        printTax($salary * 12, $taxAnnual, $taxMonthly);
                    }
                }

                function annualComputation($salary)
                {
                    if ($salary <= 250000) {
                        return $salary;
                    } else if ($salary > 250000 && $salary <= 450000) {
                        return ($salary - 250000) * 0.20;
                    } else if ($salary > 400000 && $salary <= 800000) {
                        return (($salary - 400000) * 0.25) + 30000;
                    } else if ($salary > 800000 && $salary <= 2000000) {
                        return (($salary - 800000) * 0.30) + 130000;
                    } else if ($salary > 2000000 && $salary <= 8000000) {
                        return (($salary - 2000000) * 0.32) + 490000;
                    } else if ($salary > 8000000) {
                        return (($salary - 8000000) * 0.35) + 2410000;
                    }
                }

                function printTax($annualSal, $taxAnnual, $taxMonthly)
                {
                    echo "<h2>Annual Salary: <span>$annualSal</span></h2>";
                    echo "<h2>Est. Annual Tax: <span> $taxAnnual </span></h2>";
                    echo "<h2>Est. Monthly Tax: <span> $taxMonthly </span></h2>";
                }
                ?>

            </form>

        </div>

    </div>

    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) { // if not number, cannot input
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
</body>

</html>