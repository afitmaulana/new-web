<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * This is the method that is called before a controller is executed.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah session 'logged_in' tidak ada atau bernilai false.
        if (! session()->get('logged_in')) {
            // Jika tidak ada, paksa pengguna kembali ke halaman login.
            return redirect()->to('/login');
        }
    }

    /**
     * This is the method that is called after a controller is executed.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa setelah halaman dimuat.
    }
}