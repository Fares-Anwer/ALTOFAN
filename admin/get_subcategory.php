<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $id=intval($_POST['catid']);
 $stmt=$con->prepare("SELECT * FROM tblsubcategory WHERE CategoryId=$id and Is_Active=1"); 
 $stmt->execute(array()); 
?>
<option value="">Select Subcategory</option>
<?php
 if ($stmt->rowCount()) {
    foreach ($stmt->fetchAll() as $row)
 {
  ?>
  <option value="<?php echo htmlentities($row['SubCategoryId']); ?>"><?php echo htmlentities($row['Subcategory']); ?></option>
  <?php
 }}
}
?>
   