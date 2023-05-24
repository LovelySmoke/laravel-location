<?php
  
  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Stevebauman\Location\Facades\Location;
  use Illuminate\View\View;
  
  class UserController extends Controller
  {
      /**
       * Display a listing of the resource.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\View\View
       */
      public function index(Request $request): View
      {
          $ip = $request->session()->get('ip', $request->ip());
          $currentUserInfo = Location::get($ip);
  
          return view('user', compact('currentUserInfo', 'ip'));
      }
  
      public function updateIP(Request $request)
      {
          $ip = $request->input('ip');
          $request->session()->put('ip', $ip);
  
          return redirect()->route('user.index')->with('ip', $ip);
      }
  }
  