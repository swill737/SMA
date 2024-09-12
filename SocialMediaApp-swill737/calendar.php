<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calendar</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .today {
            background-color: #ffeb3b;
        }
    </style>
</head>
<body>
    <h1>Calendar</h1>

    <?php
    // Set default timezone
    date_default_timezone_set('America/New_York');

    // Get current month and year
    $currentMonth = date('m');
    $currentYear = date('Y');

    // Get month and year from GET parameters if available
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $currentMonth = $_GET['month'];
        $currentYear = $_GET['year'];
    }

    // Get the number of days in the month
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

    // Get the first day of the month
    $firstDay = date('N', strtotime("$currentYear-$currentMonth-01"));

    // Create the calendar header
    echo "<h2>" . date('F Y', strtotime("$currentYear-$currentMonth-01")) . "</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Sun</th>";
    echo "<th>Mon</th>";
    echo "<th>Tue</th>";
    echo "<th>Wed</th>";
    echo "<th>Thu</th>";
    echo "<th>Fri</th>";
    echo "<th>Sat</th>";
    echo "</tr>";

    // Create the calendar rows
    echo "<tr>";

    // Print empty cells for days before the first day of the month
    for ($i = 1; $i < $firstDay; $i++) {
        echo "<td></td>";
    }

    // Print the days of the month
    for ($day = 1; $day <= $daysInMonth; $day++) {
        // Highlight today's date
        $class = '';
        if ($day == date('j') && $currentMonth == date('m') && $currentYear == date('Y')) {
            $class = 'today';
        }
        echo "<td class='$class'>$day</td>";

        // Start a new row after Saturday
        if (($firstDay + $day - 1) % 7 == 6) {
            echo "</tr><tr>";
        }
    }

    // Print empty cells for days after the last day of the month
    while (($firstDay + $daysInMonth - 1) % 7 != 6) {
        echo "<td></td>";
        $firstDay++;
    }

    echo "</tr>";
    echo "</table>";
    ?>

    <br>
    <form method="get" action="">
        <label for="month">Month:</label>
        <input type="number" id="month" name="month" min="1" max="12" value="<?php echo $currentMonth; ?>">
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" value="<?php echo $currentYear; ?>">
        <input type="submit" value="Go">
    </form>
</body>
</html>
