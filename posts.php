<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<?php
if (!isset($_GET['category']) || $_GET['category'] == null) {
    header('Loacation: 404.php');
} else {
    $catid = $_GET['category'];
}
?>

<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        $query = "SELECT * FROM post_tbl WHERE category='$catid'  ";
        $post = $db->select($query);
        if ($post) {
            while ($result = $post->fetch_assoc()) {
        ?>
                <div class="samepost clear">
                    <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
                    <h4><?php echo $format->formatDate($result['date']); ?> Written by <a href="#"><?php echo  $result['author']; ?></a></h4>
                    <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image" /></a>
                    <?php echo $format->Readmore($result['body']); ?>
                    <div class="readmore clear">
                        <a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
                    </div>
                </div>

            <?php }
        } else {  ?>
            <h2>No post available in this category</h2>
        <?php } ?>
  </div>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>