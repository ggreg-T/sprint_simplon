

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    	@include('layouts.app')
    <form>
      <div class="form-group m-4">
        <label for="formGroupExampleInput">Titre du Circuit</label>
        <input type="text" class="form-control"class=m-4 id="formGroupExampleInput" placeholder="Exemple">
      </div>
      <div class="form-group m-4">
        <label for="formGroupExampleInput2">Difficulté</label>
        <input type="text" class="form-control" class=m-4 id="formGroupExampleInput2" placeholder="Exemple">
      </div>
      <div class="form-group m-4">
          <label for="formGroupExampleInput">Temps estimé</label>
          <input type="text" class="form-control"class=m-4 id="formGroupExampleInput" placeholder="Exemple">
        </div>
        <div class="form-group m-4">
          <label for="formGroupExampleInput2">Localisation</label>
          <input type="text" class="form-control"class=m-4 id="formGroupExampleInput2" placeholder="Exemple">
        </div>
        <div class="form-group d-flex flex-column m-4">
          <label for="formGroupExampleInput2">Description</label>
          <textarea name="name" rows="8" cols="170"></textarea>

        </div>
        <div class="text-center">
        <input type="submit" class="btn btn-primary ml-5" name="" value="valider">
        </div>
    </form>
@include('layouts.footer')
  </body>
</html>
