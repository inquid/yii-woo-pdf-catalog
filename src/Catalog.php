<?php
namespace inquid\yiiwoocatalog;

use  inquid\yiireports\PDF_HTML;

class Catalog extends PDF_HTML
{
    /** @var array $products */
    public $products = [];

    public function setProducts($products)
    {
        $this->products = $products;
    }

    public function Body()
    {
        $this->AliasNbPages();
        $this->AddPage();
        $this->Ln(4);
        $this->SetFont('Arial', 'B', 16);
        foreach ($this->products as $key => $product) {

        }
        $this->Cell(40, 10, 'Hello World!');

        $this->Output();
    }

}
