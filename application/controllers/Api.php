<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use Xendit\Xendit;

class Api extends CI_Controller
{

    public function index()
    {
        $this->load->view('virtual_account');
    }

    public function submit()
    {
        $extId = $this->input->post("external_id");
        $bankCode = $this->input->post("bank_code");
        $name = $this->input->post("name");

        Xendit::setApiKey('xnd_development_7SpKtedAu5gtsvfRdSoHbYNURON6VMev1QFijasGw6IvCXPDAWhy8bgw5XjZa1F');

        $params = [
            "external_id" => $extId,
            "bank_code" => $bankCode,
            "name"  => $name
        ];

        $createVA = \Xendit\VirtualAccounts::create($params);
        var_dump($createVA);
    }

}

?>