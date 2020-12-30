<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="width: 40%">

        <div class="modal-content" style="padding: 0 5%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Customer login</h4>
            </div>
            <div class="modal-body">
                <form>
                    {{-- @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif --}}
                    <div class="alert alert-danger warning" style="display: none">
                        
                    </div>
                    <div class="form-group">
                        <input type="text" id="email-login" placeholder="email"
                            class="form-control" name="email" value="{{ old('email') }}" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password-login" placeholder="password"
                            class="form-control" name="password">
                    </div>

                    <p class="text-center">
                        <button type="submit" class="btn btn-template-main" id="btn-login"> <i class="fa fa-sign-in"></i> Log in</button>
                    </p>

                </form>

                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a></p>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btn-login').click((event) => {
            // if()
            $.ajax({
                type: 'POST',
                url: '{{route("login")}}',
                data: {
                    'email': $('#email-login').val(),
                    'password': $('#password-login').val()
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    console.log(data);
                    if(data.success_home){
                        window.location.href = data.success_home;
                    }else{
                        window.location.href = data.success_admin;
                    }
                },
                error: function(data){
                    console.log(data.responseJSON.error);
                    $('.warning').css("display", "block")
                    $('.warning').html(data.responseJSON.error);
                }
            });
            event.preventDefault();
        });
    });
</script>
