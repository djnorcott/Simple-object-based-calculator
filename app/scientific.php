<?php
require("Calculator.php");
require("ScientificCalculator.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_number = $_POST['first_number'] ?? 0;
    $second_number = $_POST['second_number'] ?? 0;
    $operation = $_POST['operation'] ?? '';

    $calculator = new ScientificCalculator();

    switch ($operation) {
        case '+':
            $result = $calculator->add($first_number, $second_number);
            break;
        case '-':
            $result = $calculator->subtract($first_number, $second_number);
            break;
        case 'X':
            $result = $calculator->multiply($first_number, $second_number);
            break;
        case '/':
            $result = $calculator->divide($first_number, $second_number);
            break;
        case '^':
            $result = $calculator->power($first_number, $second_number);
            break;
    }
}
?>
<html>
<head>
    <title>Calculator</title>
</html>
<body>
    <h1>Dan's calculatortron</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="number" name="first_number" value="<?php echo $_POST['first_number'] ?? ''?>"/>
        <select name="operation">
            <?php
            # Set an array of operators we allow, just to make selecting the chosen one easier
            $operators = ['+', '-', 'X', '/', '^'];

            # Loop through the array
            $operation = $_POST['operation'] ?? '';
            foreach ($operators as $operator) {
              if ($operator === $operation) {
                  $selected = 'selected';
              } else {
                  $selected = '';
              }

              # Output each operator as an option, with the current operator selected if there is one
              echo "<option $selected>$operator</option>";
            }
            ?>
        </select>
        <input type="number" name="second_number" value="<?php echo $_POST['second_number'] ?? ''?>" />
        <input type="submit" value="=" />
        <input type="number" name="result" value="<?php echo $result ?? '' ?>" readonly="readonly" />
    </form>
    <a href="index.php">Back to basic calculator</a>
</body>