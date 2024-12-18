<?php 

namespace App\Controller;

use App\Repositories\PaymentRepository;

class PaymentController extends Controller {
    private PaymentRepository $paymentRepository;

    public function __construct() {
        parent::__construct();

        $this->paymentRepository = new PaymentRepository();
    }

    public function showAll ():void {
        $payments = $this->paymentRepository->findAll();

        echo $this->twig->render('home.twig', [
            'payments' => $payments
        ]);
    }
}