<nav class="mt-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/login">Back</a></li>
        <li class="breadcrumb-item active" aria-current="page">Register</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 pt-3 pb-3 mt-4 mb-5 bg-white form-wrapper">
            <div class="container">
                <h1 class="h3 mb-3 font-weight-normal">User Registration</h1>
                <form class="" action="/register" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="firstname" class="sr-only">First Name</label>
                                <input type="text" id="inputFirstName" class="form-control" placeholder="First Name" name="firstname" value="<?php set_value('fitstname') ?>" required autofocus>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lasttname" class="sr-only">First Name</label>
                                <input type="text" id="inputLasttName" class="form-control" placeholder="Last Name" name="lastname" value="<?php set_value('lastname') ?>" required>
                            </div>
                        </div>
                    
                        <div class="col-12">
                            <div class="form-group">
                                <label for="inputEmail" class="sr-only">Email address</label>
                                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" value="<?php set_value('email') ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Password" name="password" value="" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm" class="sr-only">Confirm Password</label>
                                <input type="password" id="password_confirm" class="form-control" placeholder="Confirm Password" name="password_confirm" value="" required>
                            </div>
                        </div>
                        <?php if (! empty($errors)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <?php foreach ($errors as $field => $error) : ?>
                                    <p><?= $error ?></p>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php endif ?>
                        
                        <div class="col">
                            <button class="btn btn-dark" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>