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
<div class="container">
    <div class="row">
        <h1>Settings</h1>
    </div>
</div>