<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;

class BlogController extends Controller
{

    public function index(Request $request){
      //$records = Social::all();
      //return view('blog.index');
      $vk = new \VK\Client\VKApiClient();

      $oauth = new \VK\OAuth\VKOAuth();
      $client_id = 6950599;
      $redirect_uri = '127.0.0.1:8000/blog';
      $display = \VK\OAuth\VKOAuthDisplay::PAGE;
      $scope = [\VK\OAuth\Scopes\VKOAuthUserScope::WALL, \VK\OAuth\Scopes\VKOAuthUserScope::GROUPS];
      $state = 'secret_state_code';
      $revoke_auth = true;
      $browser_url = $oauth->getAuthorizeUrl(\VK\OAuth\VKOAuthResponseType::TOKEN, $client_id, $redirect_uri, $display, $scope, $state, null, $revoke_auth);



      return view('blog.index', ["browser_url" => $browser_url]);
    }

    public function create(){
      return view('blog.create');
    }

    public function store(){
      $records = new Social;
      $records->title = request('title');
      $records->save();
      return redirect("/blog/create");
    }
}
