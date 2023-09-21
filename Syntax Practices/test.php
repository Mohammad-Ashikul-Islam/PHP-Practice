<?php


$Category = ["Family", "Personal", "Institutional", "Passive", "Gift"];

class  ExpenseTracker
{
    public function AddIncome(): void
    {
        (int)$amount = (int)readline("\nEnter the amount: ");
        ProcessCategory();
        (bool)$categoryIndex = ProcessCategory();
        if ($categoryIndex == -1) {
            echo "Invalid category !\n";
            return;
        }
        global $Category;
        (string)$selectedCategory = $Category[$categoryIndex];
        $file = fopen("Income.txt", "a+");
        fwrite($file, ($selectedCategory + " " + $amount));
        fclose($file);
        echo "Income added sucessfully\n";
        return;
    }

}

function ProcessCategory(): int
{
    (string)$inputedCategory = readline("Enter the category");
    $inputedCategory = strtolower($inputedCategory);
    global $Category;
    (bool)$categoryMatched = false;
    for ((int)$i = 0; $i < count($Category); $i++) {
        if (strtolower($Category[$i]) == $inputedCategory) return $i;
    }
    return -1;
}

function PrintOptions(): void
{
    echo "1. Add income\n";
    echo "2. Add expense\n";
    echo "3. View incomes\n";
    echo "4. View expenses\n";
    echo "5. View savings\n";
    echo "6. View categories\n";
    echo "0. Exit\n";
    return;
}

$selfExpenseTracker = new ExpenseTracker();
while(true) {
    (int) $selectedOption = (int) readline("\nSelect an option: ");
    PrintOptions();
    if ($selectedOption == 0) break;
    else if ($selectedOption == 1) {
        $selfExpenseTracker.AddIncome();
    }
}