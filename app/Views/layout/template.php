<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
    
    <title><?= $title; ?></title>
  </head>
  <body>

    <?= $this->include('layout/navbar'); ?>
    
    <?= $this->renderSection('content'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="/js/my.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <!-- <script>
      // function previewImg(){
      //   const cover = document.querySelector('#cover');
      //   const imgPreview = document.querySelector('.img-preview');
      
      //   const coverFile = new FileReader();
      //   coverFile.readAsDataURL(cover.files[0]);
      
      //   coverFile.onload = function(e) {
      //     imgPreview.src = e.target.result;
      //   }
      // }
  
      
    </script> -->

    <script type="text/javascript">
        function tampilkanPreview(userfile,idpreview)
        {
          var gb = userfile.files;
          for (var i = 0; i < gb.length; i++)
          {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview=document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType))
            {
              //jika tipe data sesuai
              preview.file = gbPreview;
              reader.onload = (function(element)
              {
                return function(e)
                {
                  element.src = e.target.result;
                };
              })(preview);
              //membaca data URL gambar
              reader.readAsDataURL(gbPreview);
            }
              else
              {
                //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai.");
              }
          }
        }
        </script>
  </body>
</html>