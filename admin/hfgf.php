$model = trim($_POST['model']);
    $stock_number = trim($_POST['stock_number']);
    $manufacturer = trim($_POST['manufacturer']);
    $chassis_code = trim($_POST['chassis_code']);
    $manufacture_year = trim($_POST['manufacture_year']);
    $transmission = trim($_POST['transmission']);
    $displacement = trim($_POST['displacement']);
    $fuel_type = trim($_POST['fuel_type']);
    $exterior_color = trim($_POST['exterior_color']);
    $interior_color = trim($_POST['interior_color']);
    $bannerImage = '';
    $errors = [];
    $msgs = [];




    if(!empty($_FILES['bannerImage']['tmp_name'])){
        $bannerImage = time().$_FILES['bannerImage']['name'];
        $dest = '../uploads/car_images/'. $bannerImage;
        move_uploaded_file($_FILES['bannerImage']['tmp_name'],$dest);
    }









    if(empty($errors)){
        $query = $connection->prepare("INSERT INTO `cars_stock`(image,model,stock_number,manufacturer,chassis_code,manufacture_year,    displacement,transmission,fuel_type,exterior_color,interior_color) VALUES(:image,:model,:stock_number,:manufacturer,:chassis_code,:manufacture_year,:displacement,:transmission,:fuel_type,:exterior_color,:interior_color)");
        $query->bindValue(':image', $bannerImage);
        $query->bindValue(':model', $model);
        $query->bindValue(':stock_number', $stock_number);
        $query->bindValue(':manufacturer', $manufacturer);
        $query->bindValue(':chassis_code', $chassis_code);
        $query->bindValue(':manufacture_year', $manufacture_year);
        $query->bindValue(':displacement', $displacement);
        $query->bindValue(':transmission', $transmission);
        $query->bindValue(':fuel_type', $fuel_type);
        $query->bindValue(':exterior_color', $exterior_color);
        $query->bindValue(':interior_color', $interior_color);  
        $query->execute();
        $car_id = $connection->lastInsertId();

        $msgs[] = "Car added to Stock Successfully"; 
    }
