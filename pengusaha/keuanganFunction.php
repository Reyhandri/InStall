<?php
// Require the database connection file
require "../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["income-amount"], $_POST["income-month"])) {
    // Get the income amount and month from the form
    $incomeAmount = $_POST["income-amount"];
    $incomeMonth = $_POST["income-month"];

    // Insert the income data into the 'keuangan' table
    $incomeQuery = "INSERT INTO keuangan (income, expense, month) VALUES ('$incomeAmount', 0, '$incomeMonth')";
    mysqli_query($conn, $incomeQuery);
  }

  if (isset($_POST["expense-amount"], $_POST["expense-month"])) {
    // Get the expense amount and month from the form
    $expenseAmount = $_POST["expense-amount"];
    $expenseMonth = $_POST["expense-month"];

    // Insert the expense data into the 'keuangan' table
    $expenseQuery = "INSERT INTO keuangan (income, expense, month) VALUES (0, '$expenseAmount', '$expenseMonth')";
    mysqli_query($conn, $expenseQuery);
  }

  // Redirect back to the original page after adding the data
  header("Location: keuangan.php");
  exit();
}
?>