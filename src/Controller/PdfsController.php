<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Utility\PdfWriter;
use Cake\Routing\Router;

class PdfsController extends AppController {
    
    public function index() {
        
        //$this->set('baseUrl', Router::url('/js/',true));
    }
    
    public function generate() {
        $pdfWriter = new PdfWriter();
        $pdf = $pdfWriter->write('Pdfs/index', ['name' => 'xu']);
        
        $this->response->body($pdf);
        $this->response->type('pdf');
        $this->response->download(sprintf('export-%s.pdf', time()));
        
        return $this->response;
    }
}