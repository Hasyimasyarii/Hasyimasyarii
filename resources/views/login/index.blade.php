@extends('components.layout')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-4">

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
      </div>
    @endif

    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
    
        <button class="w-100 btn btn-lg btn-danger" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
    </main>
  </div>
</div>

@endsection