@extends('admin.layouts.auth')
@section('content')

<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
            <div class="app-auth-body mx-auto">	
                <div class="app-auth-branding mb-4">
                    <a class="app-logo" href="index.html">
                        <img 
                            class="logo-icon me-2" 
                            src="{{ asset('/a-portal/images/logo_tp.png') }}" 
                            alt="logo">
                    </a>
            </div>
                <h2 class="auth-heading text-center mb-5">Вход в панель</h2>
                <div class="auth-form-container text-start">
                    <form 
                        method="POST"
                        class="auth-form login-form" 
                        action="{{ route('admin.login') }}"
                    >     
                    @csrf()    
                        <div class="email mb-3">
                            <label class="sr-only" for="email">Почта</label>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                value="{{ old('email') }}"
                                class="form-control signin-email  @error('email') {{ 'is-invalid' }} @enderror" 
                                placeholder="@" 
                                required="required"
                            >
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="password mb-3">
                            <label class="sr-only" for="password">Пароль</label>
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                value="{{ old('password') }}"
                                class="form-control signin-password @error('password') {{ 'is-invalid' }} @enderror" 
                                placeholder="Пароль" 
                                required="required"
                            >
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="extra mt-3 row justify-content-between">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input 
                                            class="form-check-input" 
                                            type="checkbox"
                                            name="remember"
                                            {{ old('remember') ? 'checked' : null }}
                                            id="RememberPassword"
                                        >
                                        <label class="form-check-label" for="RememberPassword">
                                        Запомнить меня
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button 
                                type="submit"
                                 class="btn app-btn-primary w-100 theme-btn mx-auto"
                            >Войти</button>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
        <div class="auth-background-holder">
        </div>
        <div class="auth-background-mask"></div>
        <div class="auth-background-overlay p-3 p-lg-5">
            <div class="d-flex flex-column align-content-end h-100">
                <div class="h-100"></div>
                <!-- <div class="overlay-content p-3 p-lg-4 rounded">
                    <h5 class="mb-3 overlay-title">Текст</h5>
                    <div>
                      
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection