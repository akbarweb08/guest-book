@extends('partials.main')



@section('container')

<div class="container mt-5"  style="margin-top:200px;">
    <br>
        <img src="/asset/logo-login.png" class="img-fluid mt-3 mx-4" alt="">

       <form action="" method="POST" class="mt-5"  style="margin-top:200px;">
        @csrf
           <div class="form-floating rounded-pill mb-3">
               <input type="text" class="form-control rounded-pill" name="username" id="floatingInput" placeholder="Username">
               <label for="floatingInput">Username</label>
           </div>
           <div class="form-floating rounded-pill mb-3">
               <input type="password" class="form-control rounded-pill" name="password" id="Password" placeholder="Nama">
               <label for="Password">Password</label>
           </div>
           <button type="submit" class="btn btn-primary rounded-pill btn-login">Masuk</button>
       </form>

   </div>

@endsection
