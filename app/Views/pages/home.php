<nav class="mt-2" aria-label="breadcrumb">
    <div class="row">
        <div class="col mr-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </div>
        <div class="col-auto d-flex flex-nowrap">
            <form class="mt-1" action="/settings" method="post">
                <?= csrf_field() ?>
                <button class="btn btn-outline-dark pt-1 pb-2 mr-2" type="submit"><i data-feather="settings"></i></button>
            </form>
            <form class="float-right mt-1" action="/logout" method="post">
                <?= csrf_field() ?>
                <button class="btn btn-outline-dark" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Hello, <?= session()->get('firstname') ?></h1>
        </div>
    </div>
</div>