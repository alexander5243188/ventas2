<!--
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">                         
                        <h1 class="text-center"><span class="brand-name">Sistema de Ventas</span></h1>                           
                        <form class="text-left mt-5" action="{{ route('login') }}" method="POST">
                              @csrf
                            <div class="form  " >

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input 
                                        id="email" 
                                        name="email" 
                                        type="email" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        placeholder="correo electronico" 
                                        value="{{ old('email') }}" 
                                        required autocomplete="email" 
                                        autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input 
                                        id="password" 
                                        name="password" 
                                        type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        placeholder="Contraseña" 
                                        required autocomplete="current-password">
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>                               
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-dark btn-block" value="">Aceptar</button>
                                </div>
                        </div>
                    </form>  
                </div>                    
            </div>
        </div>
    </div>  -->