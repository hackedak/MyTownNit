<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.welcome');
    }
    public function About(){
        return view('pages.about');
    }
    public function Services(){
        $services_provided = array(
            'title'=> 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($services_provided);
    }
}
