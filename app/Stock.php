<?php

namespace App;

use App\Http\Requests\StocksCreateRequest;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property mixed category_id
 * @property mixed product_id
 * @property mixed price
 * @property mixed lot
 * @property mixed qty
 * @property mixed description
 * @method static leftJoin(string $string, string $string1, string $string2, string $string3)
 */
class Stock extends Model
{
    protected $fillable = [
        'qty',
        'name',
        'description',
        'price',
        'lot',
        'category_id',
        'product_id',
        'distributor_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    /**
     * @return mixed
     */
    public function getStocks()
    {
        $stocks = Stock::leftJoin('products', 'stocks.product_id', '=', 'products.id')
            ->leftJoin('types', 'stocks.category_id', '=', 'types.id')
            ->select('stocks.id', 'stocks.name', 'stocks.created_at', 'stocks.price as sprice', 'stocks.category_id', 'stocks.product_id', 'products.price as pprice', 'products.name as pname', 'types.name as tname', 'stocks.qty as sqty', 'stocks.lot')
            ->get();
        return $stocks;
    }

    /**
     * @param StocksCreateRequest $request
     * @return array
     */
    public function createStock(StocksCreateRequest $request)
    {
        try {
            $stock = new Stock;
            $stock->name = $request->get('name');
            $stock->category_id = $request->get('category__id');
            $stock->product_id = $request->get('product_id');
            $stock->price = $request->get('price');
            $stock->lot = $request->get('lot');
            $stock->qty = $request->get('qty');
            $stock->description = $request->get('description');
            $stock->save();
            return ['status' => 'saved', 'message' => __('stocks.pages.create.message'), 'stock_id' => $stock->id];
        } catch (Exception $ex) {
            abort(500, 'Could not create stock');
        }
    }
}
