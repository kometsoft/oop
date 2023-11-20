<?PHP
class Book
{
    //WITHIN THE CLASS

    //attributes, ciri-ciri, sifat
    //access modifier [Public, Protected, Private]
    protected $title; //1 setter, 1 getter
    protected $price;

    //assign default to attribute $publisher
    public $publisher = 'Printing Company.';
    public static $material = 'Paper';

    //method /function
    public function displayInfo()
    {
        //keyword $this
        $strReturn = "Title: $this->title";
        return $strReturn;
    }

    public static function kiraHarga()
    {
        return 1 * 2;
    }



    public function setTitle($title) //setter / umpukkan = assign
    {
        $this->title = $title;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getTitle() //getter / dapatkan
    {
        return "Title: " . strtoupper($this->title);
    }
    public function getPrice()
    {
        return "$" . number_format($this->price, 2);
    }
}
