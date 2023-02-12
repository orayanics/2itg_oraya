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

            <form action="" class="flex">

                <div class="input">
                    <h3>Salary</h3>
                    <input type="text" name="" id="salary" placeholder="Enter your monthly salary here">
                </div>

                <div class="input">
                    <h3>Type</h3>
                    <div class="radio-type">
                        <div >
                            <input type="radio" name="type" id="bimonthly" value="bimonthly">
                            <label for="bimonthly">Bi-Monthly</label>
                        </div>
                        
                        <div>
                            <input type="radio" name="type" id="monthly" value="monthly">
                            <label for="monthly">Monthly</label>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" value="submit">Compute</button>
                
            </form>
            <h2>Annual Salary: <span></span></h2>
            <h2>Est. Annual Tax: <span></span></h2>
            <h2>Est. Monthly Tax: <span></span></h2>
        </div>
    </div>

</body>
</html>