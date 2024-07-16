<button type="button" class="btn btn register me-3 popupbtn" data-openmodal="registerform" style="display: none;">Register</button>
<button class="btn login popupbtn" type="submit" data-openmodal="loginform" style="display: none;">
   <i class="fas fa-user-alt pe-2"></i>Login
</button>

<div class="modal fade header-model" id="auth-modal" data-bs-backdrop="static" data-bs-keyboard="false"
   tabindex="-1" aria-labelledby="auth-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <div class="modal-button">
               <button class="login-modal form-title" onclick="activateForm('loginform')">Sign in</button>
               <button class="register-modal form-title" onclick="activateForm('registerform')"> Register</button>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
               aria-label="Close"><i class="fas fa-times"></i></button>
         </div>
          <div class="modal-body user_registration_login_form">
          </div>
          <div class="modal-footer d-flex flex-column align-items-start user_registration_login_form_footer">
            <div class="or mt-1 mb-2">
               <p>or</p>
            </div>
            <p class="loginform_text"></p>
            <div class="social-media mt-4">
               <div class="facebook me-2">
                  <a href="{{ route('login.facebook') }}">
                     <i class="fab fa-facebook-f pe-2"></i>
                     Facebook
                  </a>
               </div>
               <div class="google"> 
                  <a href="{{ route('login.google') }}">
                     <i class="fab fa-google pe-2"></i>
                     Google
                  </a>
               </div>
            </div>
         </div>
      </div>
    </div>
</div>