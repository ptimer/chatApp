<?php

namespace App\Http\Controllers\Admin;

use App\Vk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    public function index(){
      $vk = new \VK\Client\VKApiClient();
      $oauth = new \VK\OAuth\VKOAuth();
      $client_id = 6950599;
      $redirect_uri = '127.0.0.1:8000/admin/companies#/';
      $display = \VK\OAuth\VKOAuthDisplay::PAGE;
      $scope = [\VK\OAuth\Scopes\VKOAuthUserScope::WALL, \VK\OAuth\Scopes\VKOAuthUserScope::GROUPS];
      $state = 'secret_state_code';
      $revoke_auth = true;
      $browser_url = $oauth->getAuthorizeUrl(\VK\OAuth\VKOAuthResponseType::TOKEN, $client_id, $redirect_uri, $display, $scope, $state, null, $revoke_auth);

      $access_token = Vk::orderBy('created_at', 'desc')->first();
      $response = $vk->users()->get($access_token->auth_key, [
            'user_ids'  => [152826268],
            'fields'    => ['online'],
      ]);

      return view('admin.companies.index', ["browser_url" => $browser_url, 'response' => $response]);
    }
}
