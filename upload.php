if (file_exists("image/" . $_FILES["upload"]["name"]))
{
 echo $_FILES["upload"]["name"] . " already exists. ";
}
else
{
 move_uploaded_file($_FILES["upload"]["tmp_name"],
 "image/" . $_FILES["upload"]["name"]);
 echo "Stored in: " . "image/" . $_FILES["upload"]["name"];
}