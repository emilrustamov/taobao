<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\PageContents;

class Page extends Controller
{
  public function createPage(Request $req)
  {
    $count = $req->moduleCount;

    for ($i=0; $i < $count; $i++) {
      $cont = "content".$i; 
      $page_content = new PageContents;
      $page_content->page_id = 1;
      $page_content->content = $req->$cont;
      $page_content->sort = $i;
      $page_content->save();
    }

    return redirect("/admin/page-list");
  }
  
  public function editPage(Request $req, int $pageId){
    $count = $req->moduleCount;
    
    for ($i=0; $i < $count; $i++) { 
      $cont = "content".$i; 
      PageContents::where('page_id', 1)->where('sort', $i)->update(['content'=>$req->$cont]);
    }
    return redirect("/admin/page-list");
  }
}