<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function index() : string
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page);
        $data2['currentyear'] = date("Y");
        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer', $data2);
    }
}

?>