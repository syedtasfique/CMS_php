<?php 
    if(isset($_POST['create_post'])){
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES ['image'] ['name'];
        $post_image_temp = $_FILES ['image'] ['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        // $post_comment_count = 4;

        move_uploaded_file($post_image_temp,"../images/$post_image");

        $query = "INSERT INTO posts (post_category_id,post_title,post_author,
        post_date,post_image,post_content,post_tags,post_status) ";
        $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}',
        '{$post_content}','{$post_tags}','{$post_status}')"; 

        $create_post_query = mysqli_query($connection,$query);

        if(!$create_post_query){
            die("falied". mysqli_error($connection));
        }
        $the_post_id = mysqli_insert_id($connection);
        echo "<p class='bg-success'>Post Created: <a href='../post.php?p_id={$the_post_id}'>View Post </a>or<a href='posts.php'> Edit more posts</a></p>";

    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <select name="post_category" id="">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Post status</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
        </select>
        
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
       <input class="btn btn-primary" type="submit" name="create_post" value="publish_post">
    </div>
</form>