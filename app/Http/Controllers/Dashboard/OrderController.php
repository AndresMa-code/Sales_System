<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display pending orders with optional filters.
     */
    public function pendingOrders(Request $request)
    {
        $row = (int) $request->input('row', 10);
        if ($row < 1 || $row > 100) {
            abort(400, 'The "row" parameter must be between 1 and 100.');
        }

        $search = $request->input('search');

        $orders = Order::with('customer')
            ->where('order_status', 'pending')
            ->when($search, function ($query) use ($search) {
                $query->where('invoice_no', 'like', "%$search%")
                    ->orWhere('id', 'like', "%$search%")
                    ->orWhere('order_date', 'like', "%$search%")
                    ->orWhere('payment_status', 'like', "%$search%")
                    ->orWhere('total', 'like', "%$search%")
                    ->orWhere('order_status', 'like', "%$search%")
                    ->orWhere('customer_id', 'like', "%$search%")
                    ->orWhereHas('customer', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            })
            ->sortable()
            ->paginate($row)
            ->appends($request->query());

        return view('orders.pending-orders', compact('orders'));
    }

    /**
     * Display completed orders with optional filters.
     */
    public function completeOrders(Request $request)
    {
        $row = (int) $request->input('row', 10);
        if ($row < 1 || $row > 100) {
            abort(400, 'The "row" parameter must be between 1 and 100.');
        }

        $search = $request->input('search');

        $orders = Order::with('customer')
            ->where('order_status', 'complete')
            ->when($search, function ($query) use ($search) {
                $query->where('invoice_no', 'like', "%$search%")
                    ->orWhere('id', 'like', "%$search%")
                    ->orWhere('order_date', 'like', "%$search%")
                    ->orWhere('payment_status', 'like', "%$search%")
                    ->orWhere('total', 'like', "%$search%")
                    ->orWhere('order_status', 'like', "%$search%")
                    ->orWhere('customer_id', 'like', "%$search%")
                    ->orWhereHas('customer', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            })
            ->sortable()
            ->paginate($row)
            ->appends($request->query());

        return view('orders.complete-orders', compact('orders'));
    }

    /**
     * Display orders with outstanding dues and optional filters.
     */
    public function pendingDue(Request $request)
    {
        $row = (int) $request->input('row', 10);
        if ($row < 1 || $row > 100) {
            abort(400, 'The "row" parameter must be between 1 and 100.');
        }

        $search = $request->input('search');

        $orders = Order::with('customer')
            ->where('due', '>', 0)
            ->when($search, function ($query) use ($search) {
                $query->where('invoice_no', 'like', "%$search%")
                    ->orWhere('id', 'like', "%$search%")
                    ->orWhere('order_date', 'like', "%$search%")
                    ->orWhere('payment_status', 'like', "%$search%")
                    ->orWhere('total', 'like', "%$search%")
                    ->orWhere('order_status', 'like', "%$search%")
                    ->orWhere('customer_id', 'like', "%$search%")
                    ->orWhereHas('customer', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            })
            ->sortable()
            ->paginate($row)
            ->appends($request->query());

        return view('orders.pending-due', compact('orders'));
    }

    /**
     * Store a newly created order.
     */
    public function storeOrder(Request $request)
    {
        $rules = [
            'customer_id' => 'required|numeric',
            'payment_status' => 'required|string',
            'pay' => 'numeric|nullable',
            'due' => 'numeric|nullable',
        ];

        $invoice_no = IdGenerator::generate([
            'table' => 'orders',
            'field' => 'invoice_no',
            'length' => 10,
            'prefix' => 'INV-'
        ]);

        $validatedData = $request->validate($rules);
        $validatedData['order_date'] = Carbon::now()->format('Y-m-d');
        $validatedData['order_status'] = 'pending';
        $validatedData['total_products'] = Cart::count();
        $validatedData['sub_total'] = Cart::subtotal();
        $validatedData['vat'] = Cart::tax();
        $validatedData['invoice_no'] = $invoice_no;
        $validatedData['total'] = Cart::total();
        $validatedData['due'] = Cart::total() - $validatedData['pay'];
        $validatedData['created_at'] = Carbon::now();

        $order_id = Order::insertGetId($validatedData);

        foreach (Cart::content() as $content) {
            OrderDetails::create([
                'order_id' => $order_id,
                'product_id' => $content->id,
                'quantity' => $content->qty,
                'unitcost' => $content->price,
                'total' => $content->total,
                'created_at' => Carbon::now(),
            ]);
        }

        Cart::destroy();

        return Redirect::route('dashboard')->with('success', '¡El pedido ha sido creado exitosamente!');
    }

    /**
     * Display the specified order details.
     */
    public function orderDetails(int $order_id)
    {
        $order = Order::findOrFail($order_id);
        $orderDetails = OrderDetails::with('product')
            ->where('order_id', $order_id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('orders.details-order', compact('order', 'orderDetails'));
    }

    /**
     * Update the order status to complete and reduce inventory.
     */
    public function updateStatus(Request $request)
    {
        $order_id = $request->id;

        $products = OrderDetails::where('order_id', $order_id)->get();

        foreach ($products as $product) {
            Product::where('id', $product->product_id)
                ->update(['product_store' => DB::raw('product_store - '.$product->quantity)]);
        }

        Order::findOrFail($order_id)->update(['order_status' => 'complete']);

        return Redirect::route('order.pendingOrders')->with('success', '¡Pedido marcado como completado!');
    }

    /**
     * Download the invoice for the given order.
     */
    public function invoiceDownload(int $order_id)
    {
        $order = Order::findOrFail($order_id);
        $orderDetails = OrderDetails::with('product')
            ->where('order_id', $order_id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('orders.invoice-order', compact('order', 'orderDetails'));
    }

    /**
     * Fetch order details via AJAX.
     */
    public function orderDueAjax(int $id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    /**
     * Update due amount for a given order.
     */
    public function updateDue(Request $request)
    {
        $rules = [
            'order_id' => 'required|numeric',
            'due' => 'required|numeric',
        ];

        $validatedData = $request->validate($rules);

        $order = Order::findOrFail($request->order_id);
        $new_due = $order->due - $validatedData['due'];
        $new_pay = $order->pay + $validatedData['due'];

        $order->update([
            'due' => $new_due,
            'pay' => $new_pay,
        ]);

        return Redirect::route('order.pendingDue')->with('success', '¡Monto adeudado actualizado exitosamente!. Pago exitoso');
    }

    /**
 * Display stock product list with optional filters.
 */
public function stockManage(Request $request)
{
    $row = (int) $request->input('row', 10);
    if ($row < 1 || $row > 100) {
        abort(400, 'The "row" parameter must be between 1 and 100.');
    }

    $search = $request->input('search');

    $products = Product::with(['category', 'supplier'])
        ->when($search, function ($query) use ($search) {
            $query->where('product_name', 'like', "%$search%")
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('name', 'like', "%$search%");
                  })
                  ->orWhereHas('supplier', function ($q) use ($search) {
                      $q->where('name', 'like', "%$search%");
                  })
                  ->orWhere('selling_price', 'like', "%$search%")
                  ->orWhere('product_store', 'like', "%$search%");
        })
        ->sortable()
        ->paginate($row)
        ->appends($request->query());

    return view('stock.index', compact('products'));
    }
}
