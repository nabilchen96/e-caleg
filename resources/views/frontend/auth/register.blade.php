<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="login-form-02/https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login-form-02/fonts/icomoon/style.css">

    <link rel="stylesheet" href="login-form-02/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login-form-02/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="login-form-02/css/style.css">

    <title>Smart Material Test</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('natural.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Register to <br><strong>Smart Material Test</strong></h3>
            <br>
            <form id="formLogin">
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="text" class="form-control" placeholder="Your active email" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control form-control-lg" id="name"
                    placeholder="Name">
            </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Your Password" id="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                {{-- <span class="ml-auto"><a href="login-form-02/#" class="forgot-pass">Forgot Password</a></span>  --}}
              </div>

              <div class="d-grid">
                <button type="submit" id="btnLogin" class="btn btn-primary btn-lg btn-block">Sign Up</button>

                <button style="display: none; background: #0d6efd;" id="btnLoginLoading"
                    class="btn btn-info btn-moodle text-white btn-lg btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>

                </button>
            </div>
            <br>
            Have an account? <a href="{{ url('login') }}" class="text-primary">Login</a>
            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

  <script>
    formLogin.onsubmit = (e) => {

        e.preventDefault();

        const formData = new FormData(formLogin);
        // document.getElementById(`btnLogin`).style.display = "disable";
        // document.getElementById(`btnLoginLoading`).style.display = "block";

        axios({
                method: 'post',
                url: '/registerProses',
                data: formData,
            })
            .then(function(res) {
                //handle success
                if (res.data.responCode == 1) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Mendaftar',
                        timer: 1000,
                        showConfirmButton: false,
                        // text: res.data.respon
                    })

                    setTimeout(() => {
                        window.location.href = '/dashboard';
                    }, 1000);

                } else {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Ada kesalahan',
                        text: `${res.data.respon}`,
                    })
                }
            })
            .catch(function(res) {
                //handle error
                console.log(res);
            }).then(function() {
                // always executed              
                document.getElementById(`btnLogin`).style.display = "block";
                document.getElementById(`btnLoginLoading`).style.display = "none";

            });

    }
</script>
    
  </body>
</html>