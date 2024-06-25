<?php
use App\Models\Product;

class ProductController extends Controller
{
    public function getProductDetails($id)
    {
        $product = Product::with(['brand', 'category', 'unit', 'tax', 'quantities.warehouse', 'attachments'])->find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'brand' => $product->brand->name,
            'category' => $product->category->name,
            'unit' => $product->unit->name,
            'tax' => [
                'name' => $product->tax->name,
                'percentage' => $product->tax->percentage
            ],
            'price' => $product->price,
            'quantities' => $product->quantities->map(function ($quantity) {
                return [
                    'warehouse' => $quantity->warehouse->name,
                    'quantity' => $quantity->quantity
                ];
            }),
            'attachments' => $product->attachments->map(function ($attachment) {
                return $attachment->url;
            }),
        ]);
    }
}
