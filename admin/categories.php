<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">

                        <?php insert_categories();  ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <?php //Update and include
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];

                            include "includes/edit_categories.php";
                        }
                        ?>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover"class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php find_All_Categories(); ?>
                                <?php delete_Categories(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>