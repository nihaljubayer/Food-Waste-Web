<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
 public function showDonorRegisterForm()
 {
 return view('Auth.register_donor');
 }

 public function showOrganizationRegisterForm()
 {
 return view('Auth.register_organization');
 }
