<nav class="mt-2" aria-label="breadcrumb">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </div>
        <div class="col-auto">
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