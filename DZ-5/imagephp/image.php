<?php require_once '../vendor/autoload.php'?>
<!DOCTYPE html>
<html>
<head>
    <title>Work with photo</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="php_text"><h2>Photo Php Standard</h2></div>
<div class="php_image">
    <img class="php_photo" src="../img/content/reviews/2.jpg" style="text-align: center; width: 600px; height: 400px;" alt="burger"/>
</div>

<?php
function changeImage() {
    $image = '../img/content/reviews/2.jpg';
    $new_image = '../img/content/new/new_image-1.jpg';

    $img = imagecreatefromjpeg($image);
    $degrees = 45;
    $imgRotated = imagerotate($img, $degrees, 0);
    imagejpeg($imgRotated, $new_image, 45);
}
changeImage();

?>

<div class="php_text-45"><h2>Photo Php 45deg</h2></div>
<div class="php_image">
    <img class="php_photo" src="../img/content/new/new_image-1.jpg" style="width: 600px; height: 400px;" alt="burger"/>
</div>

<div class="php_text-watermarker"><h2>Watermaker</h2></div>
<div class="php_image">
    <img class="php_photo" src="../img/content/watermaker/watermarker.png" style="width: 60px; height: 40px;" alt="burger"/>
</div>
<div class="php_text-watermarker"><h2>Photo not watermaker</h2></div>
<div class="php_image">
    <img class="php_photo" src="../img/bg/footer.jpg" style="width: 600px; height: 400px;" alt="burger"/>
</div>

<?php
    function image_create($image_path) {
        $ext = pathinfo($image_path, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'gif':
                $im = imagecreatefromgif($image_path);
                break;
            case 'jpg':
                $im = imagecreatefromjpeg($image_path);
                break;
            case 'png':
                $im = imagecreatefrompng($image_path);
                break;
            default:
                throw new Exception('Неверный формат файла');
        }
        unset($ext);
        return $im;
    }

    function watermark($image_source, $watermark_source) {
        // Проверка на наличие изображений
        if (!file_exists($image_source)) { throw new Exception('Изображение '.$image_source.' не найдено'); }
        if (!file_exists($watermark_source)) { throw new Exception('Изображение '.$watermark_source.' не найдено'); }

        $image = image_create($image_source);
        $watermark = image_create($watermark_source);

        $size_image = getimagesize($image_source);
        $size_water = getimagesize($watermark_source);

        $img['width'] = $size_image['0'];
        $img['height'] = $size_image['1'];

        $water['width'] = $size_water['0'];
        $water['height'] = $size_water['1'];
        $water['padding'] = 300;

        $final_x = $img['width'] - $water['width'] - $water['padding'];
        $final_y = $img['height'] - $water['width'] - $water['padding'];

        imagecopy($image, $watermark, $final_x, $final_y, 0, 0, $water['width'], $water['height']);

        imagejpeg($image, '../img/content/new/example.jpg', 90);

        imagedestroy($image);
        imagedestroy($watermark);
    }
    watermark('../img/bg/footer.jpg', '../img/content/watermaker/watermarker.png');
?>

<div class="php_text-watermarker_photo"><h2>Photo with watermaker</h2></div>
<div class="php_image">
    <img class="php_photo" src="../img/content/new/example.jpg" style="width: 600px; height: 400px;" alt="burger"/>
</div>

<div class="php_text-watermarker_photo"><h2>Photo not width</h2></div>
<div class="php_image">
    <img class="php_photo" src="../img/bg/menu.jpg" alt="burger"/>
</div>

<?php
    $standard = getimagesize("../img/content/new/menu.jpg");
    $new_width = imagecreatefromjpeg("../img/content/new/menu.jpg");

    $iwidth = $standard[0];
    $iheight = $standard[1];
    $k_width = $iwidth/200;
    $new_height = ceil($iheight / $k_width);

    $direct = imagecreatetruecolor(200, $new_height);

    imagecopyresampled($direct, $new_width, 0, 0, 0, 0, 200, $new_height, ImageSX($new_width), ImageSY($new_width));

    imagejpeg($direct, "../img/content/new/menu_small.jpg");
?>
<div class="php_text-watermarker_photo"><h2>Photo width=200px</h2></div>
<div class="php_image">
    <img class="php_photo" src="../img/content/new/menu_small.jpg" alt="burger"/>
</div>
</body>
</html>
