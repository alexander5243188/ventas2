<form class="text-left mt-5" action="{{ route('login') }}" method="POST">
    @csrf
         <div class="form  " >

                                <div id="username-field" class="field-wrapper input">
                                   
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
                                    <label class="form-label" for="form3Example3">Correo electronico</label>
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    
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
                                <label class="form-label" for="form3Example4">Contraseña</label>
                                </div>                               
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-block" value="" id="button-accept">Aceptar</button>
                                </div>
                        </div>
                    </form> 