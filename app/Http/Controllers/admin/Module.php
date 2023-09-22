<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\PageContents;

class Module extends Controller
{
  public function createModule(Request $req)
  {
    return true;
  }
}