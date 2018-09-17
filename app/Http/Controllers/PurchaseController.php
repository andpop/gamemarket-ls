<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class PurchaseController extends Controller
{
    /**
     * Вывод формы для заказа игры
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function buyForm($id) {
        $product = Product::find($id);
        if (!$product) {
            return view('errors.404');
        }

        return view('pages.buy', ['product' => $product]);
    }

    protected function sendMessage($order)
    {
        function makeMessageBody($orderId, $productName, $email)
        {
            $message = '
              <html>
                  <head>
                      <title>Заказ # '.$orderId.'</title>
                  </head>
                  <body>
                      <p>Заказ № '.$orderId.'</p>
                      <p>Email клиента: '.$email.'</p>
                      <p>Игра: '.$productName.'</p>
                  </body>
              </html>';
            return $message;

        }

        $body = makeMessageBody($order->id, Product::find($order->product_id)->name, $order->email);
        $subject = "Заказ игры #{$order->id}";
        $from = ['andrivan0580@mail.ru' => 'Andrey Ivanov'];

        // Create the Transport
        $transport = (new Swift_SmtpTransport('ssl://smtp.mail.ru', 465))
            ->setUsername('andrivan0580@mail.ru')
            ->setPassword('!QAZ2wsx')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($subject))
            ->setFrom($from)
            ->setTo(['andpop@mail.ru' => 'name'])
            ->setBody($body, 'text/html')
        ;

        // Send the message
        return $mailer->send($message);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function buy(Request $request)
    {
        $this->validate($request, [
            'user_full_name'	=>	'required',
            'email'	=>	'required|email'
        ]);

        $order = Order::add($request->all());

        $data = [];
        if ($order) {
            $data['status'] = 'OK';
            $data['message'] = "Заказ #{$order->id} сформирован. Спасибо за покупку!";
        } else {
            $data['status'] = 'ERROR';
            $data['message'] = "Извините, при оформлении заказа произошла ошибка.";
        }

        $this->sendMessage($order);

        return view('pages.order_result', ['data' => $data]);
    }
}
