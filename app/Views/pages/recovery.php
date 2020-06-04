<nav class="mt-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Password Reset</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 mt-4 pt-3 pb-3 mb-5 bg-white form-wrapper">
            <div class="container">
                <h1 class="h3 mb-3 font-weight-normal">Password Reset</h1>
                <?php if (session()->get('reset')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php session()->get('reset') ?>
                        <p class="mb-0">Email with reset link will be sent to you if email exists on our system.</p>
                    </div>    
                <?php endif; ?>
                <form action="recovery" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" value="<?php set_value('email') ?>" autofocus>
                    </div>
                    
                    <div class="row align-items-center">
                        <div class="col">
                            <?php if (session()->get('reset')): ?>
                                <a class="btn btn-dark" href="login">Back to Login</a>
                            <?php else : ?>
                                <button class="btn btn-dark" type="submit">Reset Password</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>