<?PHP

require "Book.php";

//instantiate

// echo Book::$material;
// echo Book::kiraHarga();
$objBook = new Book();

$objBook->setTitle('buku a');
$objBook->setPrice(10000);

//echo "Title: $objBook->title, Price: $objBook->price";
echo $objBook->getTitle();
echo "<BR>";
echo $objBook->getPrice();

echo "<PRE>";
//print_r($objBook);
