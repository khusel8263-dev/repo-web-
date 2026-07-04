@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            
            <div class="panel panel-default login-card">
                <div class="panel-body" style="padding: 40px 30px;">
                    
                    <div class="text-center" style="margin-bottom: 30px;">
                        <h3 class="login-brand">ASHID SOFT</h3>
                        <p class="text-muted" style="font-size: 13px; margin-top: 5px;">Удирдах системд нэвтрэх</p>
                    </div>
                    
                    <hr style="border-top: 1px solid #eee; margin-bottom: 25px;">

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label class="control-label text-muted" style="font-size: 12px; font-weight: bold;" for="email">
                                <i class="fa-solid fa-envelope" style="margin-right: 5px;"></i> Gmail хаяг
                            </label>
                            <input type="email" 
                                   id="email"
                                   name="email" 
                                   class="form-control input-lg @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" 
                                   placeholder="example@gmail.com"
                                   style="border-radius: 6px; font-size: 14px;"
                                   required 
                                   autofocus>
                            
                            @error('email')
                                <span class="help-block text-danger" style="font-size: 12px; margin-top: 5px; display: block;">
                                    <strong>Имэйл эсвэл нууц үг буруу байна.</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-4" style="margin-top: 15px;">
                            <label class="control-label text-muted" style="font-size: 12px; font-weight: bold;" for="password">
                                <i class="fa-solid fa-lock" style="margin-right: 5px;"></i> Нууц үг
                            </label>
                            <input type="password" 
                                   id="password"
                                   name="password" 
                                   class="form-control input-lg" 
                                   placeholder="••••••••"
                                   style="border-radius: 6px; font-size: 14px;"
                                   required>
                        </div>

                        <div class="checkbox" style="margin-top: 15px; margin-bottom: 25px;">
                            <label class="text-muted" style="font-size: 13px;">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Намайг сана
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-lg btn-block text-white login-btn">
                            <i class="fa-solid fa-right-to-bracket" style="margin-right: 8px;"></i> Системд нэвтрэх
                        </button>
                    </form>

                </div>
            </div>
            
            <div class="text-center" style="margin-top: 20px;">
                <small class="text-muted">&copy; {{ date('Y') }} АШИД СОФТ. Бүх эрх хуулиар хамгаалагдсан.</small>
            </div>

        </div>
    </div>
</div>

<style>
    .login-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        background: #ffffff;
    }
    .login-brand {
        font-weight: bold;
        color: rgb(215, 115, 29);
        letter-spacing: 1px;
        margin: 0;
    }
    .login-btn {
        background-color: rgb(215, 115, 29);
        color: #ffffff !important;
        border-radius: 6px;
        font-size: 14px;
        font-weight: bold;
        text-uppercase: uppercase;
        letter-spacing: 0.5px;
        border: none;
        padding: 12px;
        transition: all 0.2s ease;
    }
    .login-btn:hover, .login-btn:focus {
        background-color: rgb(190, 95, 15) !important;
        box-shadow: 0 4px 15px rgba(215, 115, 29, 0.3);
    }
    .form-control:focus {
        border-color: rgb(215, 115, 29);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(215, 115, 29, .3);
    }
</style>
@endsection