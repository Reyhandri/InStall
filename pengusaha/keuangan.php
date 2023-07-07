<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="kelola.css">
  <link rel="icon" href="../img/1.png" type ="image/x-icon">
  <style>
    .container {
      max-width: 1200px;
      margin: 20px auto;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 20px;
    }

    .content {
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    .content h1,
    .content h2 {
      margin-top: 0;
    }

    .balance {
      font-weight: bold;
      margin-top: auto;
    }

    /* Styles for input fields and buttons */
    input[type="text"],
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 16px;
    }

    input[type="month"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 16px;
    }

    input[type="submit"],
    .record-delete-button,
    .record-edit-button {
      background-color: #ff69b4;
      color: #ffffff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover,
    .record-delete-button:hover,
    .record-edit-button:hover {
      background-color: #ad1457;
    }

    .record-delete-button,
    .record-edit-button {
      margin-top: 5px;
    }
  </style>
  <title>InStall</title>
</head>

<body>

  <?php
    if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
      $idPengguna = $_SESSION['id'];
    }

  include "../connect.php";
  ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../img/1.png" alt="" width="50" height="50" class="me-2">
        <strong>InStall</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        
        <ul class="navbar-nav ms-auto">
          
          <li>
          <?php
              if (isset($_SESSION['id_jenis']) && $_SESSION['id_jenis'] == TRUE) {
                $jenis = $_SESSION['id_jenis'];
                if ($jenis == 2) {
                  echo "
                          <a class='nav-link' href='histori.php' style='color: black;'>Histori</a>
                        ";
                } else if ($jenis == 3) {
                  echo "
                          <a class='nav-link' href='pengusaha.php' style='color: white;'>Bisnis Anda</a>
                          <li>
                          <li>
                          <a class='nav-link' href='menu.php' style='color: white;'>Menu</a>
                          </li>
                          <a class='nav-link' href='kelola.php' style='color: white;'>Kelola Stok</a>
                          </li>
                          <a class='nav-link' href='keuangan.php' style='color: #c62298;'>Kelola keuangan</a>
                          </li>
                        ";
                }
              }
            ?>
        </ul>
        <ul class="navbar-nav ms-auto"> 
          <?php
              if (isset($_SESSION['email']) && $_SESSION['email'] == TRUE) {
                $email = $_SESSION['email'];
                echo '
                    <li class="nav-item">
                      <img src="logined/userimg/user-' . $idPengguna . '.jpg" class="rounded-circle" onError="this.src = \'../img/1.png\'" style="width:40px; height:40px">
                    </li> 
                    <li class="nav-item">
                      <a href="../logined/profile.php" class="nav-link">' . $email . '</a>
                    </li>
                    <li class="nav-item">
                      <a href="../logout.php" class="nav-link" style="color: red;">Logout</a>
                    </li>
                    ';
              } else {
                echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='../register.php'> Daftar</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='../login.php'> Masuk</a>
                    </li>
                    ";
              }
          ?>   
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <br>

  <!-- isi -->
<h1>Restaurant Financial Tracker</h1>
  <div class="container">
    <div class="content">
    <form id="income-form" method="POST" action="keuanganFunction.php">
        <label for="income-amount">Income Amount:</label>
        <input type="text" id="income-amount" name="income-amount" placeholder="Enter income amount" required>
        <label for="income-month">Month:</label>
        <input type="month" id="income-month" name="income-month" required>

        <input type="submit" value="Add Income">
      </form>
    </div>

    <div class="content">
    <form id="expense-form" method="POST" action="keuanganFunction.php">
        <label for="expense-amount">Expense Amount:</label>
        <input type="text" id="expense-amount" name="expense-amount" placeholder="Enter expense amount" required>
        <label for="expense-month">Month:</label>
        <input type="month" id="expense-month" name="expense-month" required>

        <input type="submit" value="Add Expense">
      </form>
    </div>

    <div class="content">
      <h2>Riwayat Pemasukan</h2>
      <div id="income-records">
      <?php
        require "../connect.php";

        $sql = mysqli_query($conn, "SELECT SUM(income) AS income, month FROM keuangan GROUP BY month");
        $count = mysqli_num_rows($sql);
        if ($count > 0) {
          echo '<table>';
          echo '<tr><th>Pemasukan</th><th>Bulan</th></tr>';
  
          while ($row = mysqli_fetch_assoc($sql)) {
            echo '<tr>';
            echo '<td>Rp. ' . $row['income'] . '</td>';
            echo '<td>' . $row['month'] . '</td>';
            echo '</tr>';
          }
  
          echo '</table>';
        } else {
          echo 'No income records found.';
        }
      ?>
      </div>
    </div>

    <div class="content">
      <h2>Riwayat Pengeluaran</h2>
      <div id="expense-records">
      <?php
        require "../connect.php";

        $sql = mysqli_query($conn, "SELECT SUM(expense) AS expense, month FROM keuangan GROUP BY month");
        $count = mysqli_num_rows($sql);
        if ($count > 0) {
          echo '<table>';
          echo '<tr><th>Pengeluaran</th><th>Bulan</th></tr>';
  
          while ($row = mysqli_fetch_assoc($sql)) {
            echo '<tr>';
            echo '<td>Rp. ' . $row['expense'] . '</td>';
            echo '<td>' . $row['month'] . '</td>';
            echo '</tr>';
          }
          echo '</table>';
        } else {
          echo 'No income records found.';
        }
      ?>
      </div>
    </div>

    <div class="content">
      <h2>Monthly Financial Graph</h2>
      <canvas id="barChart"></canvas>
      <?php
        // PHP code to fetch data from MySQL database
        require "../connect.php";

        $query = "SELECT month, SUM(income) AS total_income, SUM(expense) AS total_expense FROM keuangan GROUP BY month";
        $result = mysqli_query($conn, $query);

        $labels = [];
        $incomeData = [];
        $expenseData = [];

        while ($row = mysqli_fetch_assoc($result)) {
          $labels[] = $row['month'];
          $incomeData[] = $row['total_income'];
          $expenseData[] = $row['total_expense'];
        }
      ?>
    </div>

    <div class="content">
      <div class="balance">Balance: Rp.
        <?php
            require "../connect.php";
            $sql = mysqli_query($conn, "SELECT SUM(income) - SUM(expense) FROM keuangan ");
            $result = mysqli_fetch_array($sql);
            $balance = $result[0];
            // Format the balance as a nominal number
            $formattedBalance = number_format($balance, 2, ',', '.');
          echo '<span>'.$formattedBalance.'</span>';
          ?> 
      </div>
    </div>
  </div>
    
    <!-- isi -->

    <!-- Footer -->
<footer class="bg-dark p-5 position-sticky top-100">
    <div class="container">
      <div class="row">
        <div class="col" style="text-align: center;">
          <img src="../img/1.png" style="width: 30px;">
          <span style="color: white;">Copyright &copy; 2023 Barudak Sistem</span>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->
  <!-- php --->

  

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('barChart').getContext('2d');

const data = {
  labels: <?php echo json_encode($labels); ?>,
  datasets: [{
    label: 'Income',
    data: <?php echo json_encode($incomeData); ?>,
    backgroundColor: 'rgba(0, 123, 255, 0.7)',
    borderColor: 'rgba(0, 123, 255, 1)',
    borderWidth: 1
  }, {
    label: 'Expense',
    data: <?php echo json_encode($expenseData); ?>,
    backgroundColor: 'rgba(255, 0, 0, 0.7)',
    borderColor: 'rgba(255, 0, 0, 1)',
    borderWidth: 1
  }]
};

const options = {
  responsive: true,
  scales: {
    y: {
      beginAtZero: true
    }
  }
};

new Chart(ctx, {
  type: 'bar',
  data: data,
  options: options
});
  // // Retrieve the JSON data from PHP
  // var chartDataJson = 

  //   // Extract labels, income, and expenses from the JSON data
  //   var labels = chartDataJson.map(function(item) {
  //     return item.label;
  //   });
  //   var incomeData = chartDataJson.map(function(item) {
  //     return item.income;
  //   });
  //   var expenseData = chartDataJson.map(function(item) {
  //     return item.expenses;
  //   });

  //   // Create the chart using Chart.js
  //   var ctx = document.getElementById('chart').getContext('2d');
  //   var myChart = new Chart(ctx, {
  //     type: 'bar',
  //     data: {
  //       labels: labels,
  //       datasets: [
  //         {
  //           label: 'Income',
  //           data: incomeData,
  //           backgroundColor: 'rgba(75, 192, 192, 0.5)',
  //           borderColor: 'rgba(75, 192, 192, 1)',
  //           borderWidth: 1
  //         },
  //         {
  //           label: 'Expenses',
  //           data: expenseData,
  //           backgroundColor: 'rgba(255, 99, 132, 0.5)',
  //           borderColor: 'rgba(255, 99, 132, 1)',
  //           borderWidth: 1
  //         }
  //       ]
  //     },
  //     options: {
  //       scales: {
  //         y: {
  //           beginAtZero: true
  //         }
  //       }
  //     }
  //   });
  // Monthly financial data
//   let monthlyData = [];

// // Generate the graph using the data
// const chartContainer = document.getElementById("chart");

// // Prepare the data for the chart
// const chartData = monthlyData.map(data => ({
//   label: data.month,
//   income: data.income,
//   expenses: data.expenses
// }));

// // Create the chart
// const chart = new Chart(chartContainer, {
//   type: "bar",
//   data: {
//     labels: chartData.map(data => data.label),
//     datasets: [{
//         label: "Income",
//         backgroundColor: "rgba(75, 192, 192, 0.5)",
//         data: chartData.map(data => data.income)
//       },
//       {
//         label: "Expenses",
//         backgroundColor: "rgba(255, 99, 132, 0.5)",
//         data: chartData.map(data => data.expenses)
//       }
//     ]
//   },
//   options: {
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// });

//      // Income form submission
//      const incomeForm = document.getElementById("income-form");
//     incomeForm.addEventListener("submit", function(event) {
//       event.preventDefault();

//       const incomeAmountInput = document.getElementById("income-amount");
//       const incomeCategoryInput = document.getElementById("income-category");
//       const incomeMonthInput = document.getElementById("income-month");
//       const incomeAmount = parseFloat(incomeAmountInput.value);
//       const incomeCategory = incomeCategoryInput.value;
//       const incomeMonth = incomeMonthInput.value;

//       if (isNaN(incomeAmount)) {
//         alert("Please enter a valid income amount.");
//         return;
//       }

//       addIncome(incomeAmount, incomeCategory, incomeMonth);
//       updateBalance();
//       updateChart();

//       incomeAmountInput.value = "";
//     });

//     // Expense form submission
//     const expenseForm = document.getElementById("expense-form");
//     expenseForm.addEventListener("submit", function(event) {
//       event.preventDefault();

//       const expenseAmountInput = document.getElementById("expense-amount");
//       const expenseCategoryInput = document.getElementById("expense-category");
//       const expenseMonthInput = document.getElementById("expense-month");
//       const expenseAmount = parseFloat(expenseAmountInput.value);
//       const expenseCategory = expenseCategoryInput.value;
//       const expenseMonth = expenseMonthInput.value;

//       if (isNaN(expenseAmount)) {
//         alert("Please enter a valid expense amount.");
//         return;
//       }

//       addExpense(expenseAmount, expenseCategory, expenseMonth);
//       updateBalance();
//       updateChart();

//       expenseAmountInput.value = "";
//     });

//     // Add income to the monthly data
//     function addIncome(amount, category, month) {
//       const existingData = monthlyData.find(data => data.month === month);

//       if (existingData) {
//         existingData.income += amount;
//       } else {
//         monthlyData.push({
//           month: month,
//           income: amount,
//           expenses: 0
//         });
//       }

//       const incomeRecords = document.getElementById("income-records");
//       const recordItem = document.createElement("div");
//       recordItem.textContent = `Rp${amount} - ${category} (${month})`;
//       recordItem.style.animation = "fadeIn 1s ease";

//       // Create delete button for income record
//       const deleteButton = document.createElement("button");
//       deleteButton.textContent = "Delete";
//       deleteButton.className = "record-delete-button";
//       deleteButton.addEventListener("click", function() {
//         deleteIncomeRecord(recordItem);
//       });

//       // Create edit button for income record
//       const editButton = document.createElement("button");
//       editButton.textContent = "Edit";
//       editButton.className = "record-edit-button";
//       editButton.addEventListener("click", function() {
//         editIncomeRecord(recordItem);
//       });

//       recordItem.appendChild(deleteButton);
//       recordItem.appendChild(editButton);
//       incomeRecords.appendChild(recordItem);
//     }

//     // Add expense to the monthly data
//     function addExpense(amount, category, month) {
//       const existingData = monthlyData.find(data => data.month === month);

//       if (existingData) {
//         existingData.expenses += amount;
//       } else {
//         monthlyData.push({
//           month: month,
//           income: 0,
//           expenses: amount
//         });
//       }

//       const expenseRecords = document.getElementById("expense-records");
//       const recordItem = document.createElement("div");
//       recordItem.textContent = `Rp${amount} - ${category} (${month})`;
//       recordItem.style.animation = "fadeIn 1s ease";

//       // Create delete button for expense record
//       const deleteButton = document.createElement("button");
//       deleteButton.textContent = "Delete";
//       deleteButton.className = "record-delete-button";
//       deleteButton.addEventListener("click", function() {
//         deleteExpenseRecord(recordItem);
//       });

//       // Create edit button for expense record
//       const editButton = document.createElement("button");
//       editButton.textContent = "Edit";
//       editButton.className = "record-edit-button";
//       editButton.addEventListener("click", function() {
//         editExpenseRecord(recordItem);
//       });

//       recordItem.appendChild(deleteButton);
//       recordItem.appendChild(editButton);
//       expenseRecords.appendChild(recordItem);
//     }

//     // Delete income record
//     function deleteIncomeRecord(recordItem) {
//       const recordText = recordItem.textContent;
//       const incomeAmount = parseFloat(recordText.substring(1, recordText.indexOf(" - ")));
//       const incomeCategory = recordText.substring(recordText.indexOf(" - ") + 3, recordText.indexOf(" ("));
//       const incomeMonth = recordText.substring(recordText.indexOf("(") + 1, recordText.indexOf(")"));

//       const existingData = monthlyData.find(data => data.month === incomeMonth);
//       if (existingData) {
//         existingData.income -= incomeAmount;
//         if (existingData.income === 0 && existingData.expenses === 0) {
//           monthlyData = monthlyData.filter(data => data.month !== incomeMonth);
//         }
//       }

//       recordItem.style.animation = "fadeOut 1s ease";
//       setTimeout(function() {
//         recordItem.remove();
//         updateBalance();
//         updateChart();
//       }, 1000);
//     }

//     // Delete expense record
//     function deleteExpenseRecord(recordItem) {
//       const recordText = recordItem.textContent;
//       const expenseAmount = parseFloat(recordText.substring(1, recordText.indexOf(" - ")));
//       const expenseCategory = recordText.substring(recordText.indexOf(" - ") + 3, recordText.indexOf(" ("));
//       const expenseMonth = recordText.substring(recordText.indexOf("(") + 1, recordText.indexOf(")"));

//       const existingData = monthlyData.find(data => data.month === expenseMonth);
//       if (existingData) {
//         existingData.expenses -= expenseAmount;
//         if (existingData.income === 0 && existingData.expenses === 0) {
//           monthlyData = monthlyData.filter(data => data.month !== expenseMonth);
//         }
//       }

//       recordItem.style.animation = "fadeOut 1s ease";
//       setTimeout(function() {
//         recordItem.remove();
//         updateBalance();
//         updateChart();
//       }, 1000);
//     }

//     // Edit income record
//     function editIncomeRecord(recordItem) {
//       const recordText = recordItem.textContent;
//       const incomeAmount = parseFloat(recordText.substring(1, recordText.indexOf(" - ")));
//       const incomeCategory = recordText.substring(recordText.indexOf(" - ") + 3, recordText.indexOf(" ("));
//       const incomeMonth = recordText.substring(recordText.indexOf("(") + 1, recordText.indexOf(")"));

//       // Create edit form for income record
//       const editForm = document.createElement("form");
//       editForm.className = "edit-form";

//       const amountInput = document.createElement("input");
//       amountInput.type = "text";
//       amountInput.value = incomeAmount;
//       editForm.appendChild(amountInput);

//       const categoryInput = document.createElement("select");
//       const salesOption = document.createElement("option");
//       salesOption.value = "sales";
//       salesOption.textContent = "Sales";
//       const servicesOption = document.createElement("option");
//       servicesOption.value = "services";
//       servicesOption.textContent = "Services";
//       const otherOption = document.createElement("option");
//       otherOption.value = "other";
//       otherOption.textContent = "Other";
//       categoryInput.appendChild(salesOption);
//       categoryInput.appendChild(servicesOption);
//       categoryInput.appendChild(otherOption);
//       categoryInput.value = incomeCategory;
//       editForm.appendChild(categoryInput);

//       const monthInput = document.createElement("input");
//       monthInput.type = "month";
//       monthInput.value = incomeMonth;
//       editForm.appendChild(monthInput);

//       const saveButton = document.createElement("button");
//       saveButton.textContent = "Save";
//       saveButton.className = "record-edit-button";
//       saveButton.addEventListener("click", function(event) {
//         event.preventDefault();
//         const newAmount = parseFloat(amountInput.value);
//         const newCategory = categoryInput.value;
//         const newMonth = monthInput.value;

//         if (isNaN(newAmount)) {
//           alert("Please enter a valid income amount.");
//           return;
//         }

//         const existingData = monthlyData.find(data => data.month === incomeMonth);
//         if (existingData) {
//           existingData.income -= incomeAmount;
//           existingData.income += newAmount;
//         }

//         recordItem.textContent = `$${newAmount} - ${newCategory} (${newMonth})`;

//         const deleteButton = document.createElement("button");
//         deleteButton.textContent = "Delete";
//         deleteButton.className = "record-delete-button";
//         deleteButton.addEventListener("click", function() {
//           deleteIncomeRecord(recordItem);
//         });

//         const editButton = document.createElement("button");
//         editButton.textContent = "Edit";
//         editButton.className = "record-edit-button";
//         editButton.addEventListener("click", function() {
//           editIncomeRecord(recordItem);
//         });

//         recordItem.appendChild(deleteButton);
//         recordItem.appendChild(editButton);

//         updateBalance();
//         updateChart();
//       });
//       editForm.appendChild(saveButton);

//       recordItem.textContent = "";
//       recordItem.appendChild(editForm);
//     }

//     // Edit expense record
//     function editExpenseRecord(recordItem) {
//       const recordText = recordItem.textContent;
//       const expenseAmount = parseFloat(recordText.substring(1, recordText.indexOf(" - ")));
//       const expenseCategory = recordText.substring(recordText.indexOf(" - ") + 3, recordText.indexOf(" ("));
//       const expenseMonth = recordText.substring(recordText.indexOf("(") + 1, recordText.indexOf(")"));

//       // Create edit form for expense record
//       const editForm = document.createElement("form");
//       editForm.className = "edit-form";

//       const amountInput = document.createElement("input");
//       amountInput.type = "text";
//       amountInput.value = expenseAmount;
//       editForm.appendChild(amountInput);

//       const categoryInput = document.createElement("select");
//       const foodOption = document.createElement("option");
//       foodOption.value = "food";
//       foodOption.textContent = "Food";
//       const drinksOption = document.createElement("option");
//       drinksOption.value = "drinks";
//       drinksOption.textContent = "Drinks";
//       const suppliesOption = document.createElement("option");
//       suppliesOption.value = "supplies";
//       suppliesOption.textContent = "Supplies";
//       categoryInput.appendChild(foodOption);
//       categoryInput.appendChild(drinksOption);
//       categoryInput.appendChild(suppliesOption);
//       categoryInput.value = expenseCategory;
//       editForm.appendChild(categoryInput);

//       const monthInput = document.createElement("input");
//       monthInput.type = "month";
//       monthInput.value = expenseMonth;
//       editForm.appendChild(monthInput);

//       const saveButton = document.createElement("button");
//       saveButton.textContent = "Save";
//       saveButton.className = "record-edit-button";
//       saveButton.addEventListener("click", function(event) {
//         event.preventDefault();
//         const newAmount = parseFloat(amountInput.value);
//         const newCategory = categoryInput.value;
//         const newMonth = monthInput.value;

//         if (isNaN(newAmount)) {
//           alert("Please enter a valid expense amount.");
//           return;
//         }

//         const existingData = monthlyData.find(data => data.month === expenseMonth);
//         if (existingData) {
//           existingData.expenses -= expenseAmount;
//           existingData.expenses += newAmount;
//         }

//         recordItem.textContent = `$${newAmount} - ${newCategory} (${newMonth})`;

//         const deleteButton = document.createElement("button");
//         deleteButton.textContent = "Delete";
//         deleteButton.className = "record-delete-button";
//         deleteButton.addEventListener("click", function() {
//           deleteExpenseRecord(recordItem);
//         });

//         const editButton = document.createElement("button");
//         editButton.textContent = "Edit";
//         editButton.className = "record-edit-button";
//         editButton.addEventListener("click", function() {
//           editExpenseRecord(recordItem);
//         });

//         recordItem.appendChild(deleteButton);
//         recordItem.appendChild(editButton);

//         updateBalance();
//         updateChart();
//       });
//       editForm.appendChild(saveButton);

//       recordItem.textContent = "";
//       recordItem.appendChild(editForm);
//     }

//     // Update the balance display
//     function updateBalance() {
//       const totalIncome = monthlyData.reduce((total, data) => total + data.income, 0);
//       const totalExpenses = monthlyData.reduce((total, data) => total + data.expenses, 0);
//       const balance = totalIncome - totalExpenses;
//       const balanceElement = document.getElementById("balance");
//       balanceElement.textContent = balance.toFixed(2);
//       balanceElement.style.animation = "scale 0.5s ease";
//       setTimeout(function() {
//         balanceElement.style.animation = "";
//       }, 500);
//     }

//     // Update the chart with the latest data
//     function updateChart() {
//       const chartData = monthlyData.map(data => ({
//         label: data.month,
//         income: data.income,
//         expenses: data.expenses
//       }));

//       chart.data.labels = chartData.map(data => data.label);
//       chart.data.datasets[0].data = chartData.map(data => data.income);
//       chart.data.datasets[1].data = chartData.map(data => data.expenses);
//       chart.update();
//     }
  </script>
  </body>

</html>