<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="/css/index.css">
  <title>Macuin Dashboard</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="welcome" method="POST">
                    @csrf
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" class="form-controll" id="exampleInputEmail1" aria-describeby="emailHelp" value="{{old('username')}}" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" class="form-controll" id="exampleInputPassword1" value="{{old('password')}}" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#"> Forget Password </a></label>

                    </div>
                    <button type="submit" class="btn btn-secondary" > Log in </button>
                    <div class="register" onclick="location.href='{{route('priAdm')}}'">
                        <p>¿No tienes una cuenta? <a href="#">Registrate</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
