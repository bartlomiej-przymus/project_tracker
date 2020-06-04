<nav class="mt-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 mt-4 pt-3 pb-3 mb-5 bg-white form-wrapper">
            <div class="container">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php session()->get('success') ?>
                        <p class="mb-0">Success! You have been registered!</p>
                    </div>    
                <?php endif; ?>
                <form class="" action="/login" method="post">
                    <div class="form-group">
                    <?= csrf_field() ?>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" value="<?php set_value('email') ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="" required>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                        <a href="recovery" class="float-right text-danger">Forgot password</a>
                    </div>
                    <div class="row row-cols-2 align-items-center">
                        <?php if (! empty($errors)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <?php foreach ($errors as $field => $error) : ?>
                                    <p class="mb-0"><?= $error ?></p>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <div class="col-4">
                            <button class="btn btn-dark" type="submit">Log in</button>
                        </div>
                        <div class="col-8 text-right">
                            <a href="/register">No account? - Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>