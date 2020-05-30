<nav class="mt-2" aria-label="breadcrumb">
    <div class="row">
        <div class="col mr-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Back</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </div>
        <div class="col-auto d-flex flex-nowrap">
            <form class="float-right mt-1" action="/logout" method="post">
                <?= csrf_field() ?>
                <button class="btn btn-outline-dark" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>
<div class="card border-dark text-center mb-3">
    <div class="card-header bg-dark">
        <a class="close text-light float-right" href="/home">&times;</a>
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
        <h5 class="card-title">Settings</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>