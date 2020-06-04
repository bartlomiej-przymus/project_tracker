<nav class="mt-2" aria-label="breadcrumb">
    <div class="row">
        <div class="col mr-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </div>
        <div class="col-auto d-flex flex-nowrap">
            
                <a class="btn btn-outline-dark mt-1 mr-2 mb-4" href="settings"><i class="mb-1" data-feather="settings"></i></a>

            <form class="float-right mt-1" action="logout" method="post">
                <?= csrf_field() ?>
                <button class="btn btn-outline-dark" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

    <div class="row justify-content-between">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
            <button class="add_group" type="submit"><h1>+</h1>Add Project<br>Group</button>
        </div>
    </div>
