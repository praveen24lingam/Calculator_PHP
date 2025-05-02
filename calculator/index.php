<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container" style="margin-top: 50px; max-width: 600px;">

        <h2>Simple Calculator</h2>

        <?php
        $result = '';
        $error = '';

        if (isset($_POST['submit'])) {
            $number1 = $_POST['number1'];
            $number2 = $_POST['number2'];
            $operation = $_POST['operation'];

            if (is_numeric($number1) && is_numeric($number2)) {
                switch ($operation) {
                    case 'plus':
                        $result = $number1 + $number2;
                        break;
                    case 'minus':
                        $result = $number1 - $number2;
                        break;
                    case 'times':
                        $result = $number1 * $number2;
                        break;
                    case 'divided by':
                        if ($number2 != 0) {
                            $result = $number1 / $number2;
                        } else {
                            $error = "Cannot divide by zero!";
                        }
                        break;
                    default:
                        $error = "Invalid operation.";
                }
            } else {
                $error = "Both inputs must be numeric.";
            }
        }
        ?>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php elseif ($result !== ''): ?>
            <div class="alert alert-success">
                <strong>Result:</strong> <?php echo "{$number1} {$operation} {$number2} = {$result}"; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="" class="form-inline">
            <div class="form-group">
                <input name="number1" type="text" class="form-control" placeholder="First number" required />
            </div>

            <div class="form-group">
                <select name="operation" class="form-control">
                    <option value="plus">+</option>
                    <option value="minus">−</option>
                    <option value="times">×</option>
                    <option value="divided by">÷</option>
                </select>
            </div>

            <div class="form-group">
                <input name="number2" type="text" class="form-control" placeholder="Second number" required />
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Calculate</button>
        </form>
    </div>
</body>
</html>
