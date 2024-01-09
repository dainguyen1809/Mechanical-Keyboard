<?php 
    $sql = "select * from manufacturers";
    $manu = mysqli_query($conn, $sql);
?>

<?php foreach($manu as $each){?>
<li>
    <div class="d-flex justify-content-between fruite-name">
        <a href="./prods_by_manufacturer.php?manufactuers_name=<?php echo $each['manufacturers_name']?>">
            <?php echo $each['manufacturers_name'];?></a>
    </div>
</li>
<?php }?>