<!DOCTYPE html>
<html lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<?php include_stylesheets() ?>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse"
                    data-target=".nav-collapse">
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
                </button>
                <a href="#" class="brand active">Car management system</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="/user">Users</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="span12">
                <?php echo $sf_content ?>
            </div>
        </div>
    </div>
    <?php include_javascripts() ?>
</body>
</html>