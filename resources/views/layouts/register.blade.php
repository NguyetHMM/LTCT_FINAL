<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="width: 40%">

        <div class="modal-content" style="padding: 0 5%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Register">CUSTOMER REGISTER</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="alert alert-danger warning" style="display: none">
                        
                    </div>
                    <div class="form-group">
                        <input type="text" id="name-register" placeholder="name"
                            class="form-control" name="name" required autocomplete="name">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email-register" placeholder="email"
                            class="form-control" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                    </div>
                    <div class="form-group">
                        <input type="password" id="password-register" placeholder="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password"> 
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="conf-password-register" placeholder="confirm password" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <p class="text-center">
                        <button class="btn btn-template-main" id="btn-register"><i class="fa fa-sign-in"></i> Register</button>
                    </p>

                </form>

                <p class="text-center text-muted">Already have a account?</p>
                <p class="text-center text-muted"><a href="#" ><strong>Login</strong></a></p>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btn-register').click((event) => {
            // if()
            $.ajax({
                type: 'POST',
                url: '{{route("register")}}',
                data: {
                    'name': $('#name-register').val(),
                    'email': $('#email-register').val(),
                    'password': $('#password-register').val(),
                    'password_confirmation': $('#conf-password-register').val(),
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    console.log(data);
                    alert(data.success);
                    window.location.href = data.route;
                },
                error: function(data){
                    console.log(data.responseJSON);
                    $('.warning').css("display", "block")
                    $('.warning').html(data.responseJSON.error);
                }
            });
            event.preventDefault();
        });
    });
</script>
