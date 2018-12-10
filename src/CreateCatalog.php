<?php
/**
 * Created by PhpStorm.
 * User: gogl92
 * Date: 12/8/18
 * Time: 12:03 AM
 */

namespace inquid\yiiwoocatalog;


use yii\base\Component;
use inquid\yiiwoocatalog\Catalog;

class CreateCatalog extends Component
{
    public $domain;
    public $key;
    public $secret;
    public $products;

    public function downloadProducts()
    {
        $woocommerce = new Client(
            $this->domain,
            $this->key,
            $this->secret,
            [
                'wp_api' => true,
                'version' => 'wc/v2',
            ]
        );
        $page = 1;
        $products = [];
        $all_products = [];
        do {
            try {
                $products = $woocommerce->get('products', array('per_page' => 100, 'page' => $page));
            } catch (HttpClientException $e) {
                die("Can't get products: $e");
            }
            $all_products[] = $products;
            $page++;
        } while (count($products) > 0);
        return $this->products = $all_products;
    }

    public function getPdf($pdfName = 'catalog.pdf')
    {
        $catalog = new Catalog('P', 'mm', 'Letter');
        $catalog->setProducts($this->downloadProducts());
        $catalog->Body();
        return $catalog->Output('I', $pdfName, true);
    }
}