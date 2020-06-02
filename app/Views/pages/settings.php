<nav class="mt-2" aria-label="breadcrumb">
    <div class="row">
        <div class="col mr-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </div>
        <div class="col-auto d-flex flex-nowrap">
            <form class="float-right mt-1" action="logout" method="post">
                <?= csrf_field() ?>
                <button class="btn btn-outline-dark" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>
<div class="card border-dark text-center mb-3">
    <div class="card-header bg-dark">
        <a class="close text-light float-right" href="home">&times;</a>
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">Sync</a>
            </li>
        </ul>
        
    </div>
    <div class="card-body">
    <div class="container">
                <h1 class="h3 mb-3 font-weight-normal">User Details</h1>
                <p>Use fields below to update your details. Leave password field blank if you do not wish to change your password.</p>
                <?php if (session()->get('update')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php session()->get('update') ?>
                        <p class="mb-0">Success! Your details have been succesfully updated!</p>
                    </div>    
                <?php endif; ?>
                <form class="" action="settings" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="firstname" class="sr-only">First Name</label>
                                <input type="text" id="inputFirstName" class="form-control" placeholder="First Name" name="firstname" value="<?= set_value('firstname', $firstname) ?>" autofocus>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lasttname" class="sr-only">First Name</label>
                                <input type="text" id="inputLasttName" class="form-control" placeholder="Last Name" name="lastname" value="<?= set_value('lastname', $lastname) ?>" >
                            </div>
                        </div>
                    
                        <div class="col-12">
                            <div class="form-group">
                                <label for="inputEmail" class="sr-only">Email address</label>
                                <input type="email" id="inputEmail" class="form-control" readonly name="email" placeholder="Email address" value="<?= $email ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Password" name="password" value="" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm" class="sr-only">Confirm Password</label>
                                <input type="password" id="password_confirm" class="form-control" placeholder="Confirm Password" name="password_confirm" value="" >
                            </div>
                        </div>
                        <?php if (! empty($errors)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <?php foreach ($errors as $field => $error) : ?>
                                    <p class="mb-0"><?= $error ?></p>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php endif ?>
                        
                        <div class="col">
                            <button class="btn btn-dark" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>